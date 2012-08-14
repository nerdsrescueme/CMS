<?php

class Navigation {

	public static function build($identifier)
	{
		$group = Model_Link_Group::find_with_parent_links('first', array('identifier', $identifier));
		
		if (!$group)
		{
			throw new InvalidArgumentException('You have requested a navigation list that does not exist');
		}

		$dom        = new DOMDocument();
		$list       = $dom->createElement('ul');
		$build_link = function($link) use (&$dom)
		{
			$li = $dom->createElement('li');
			$a  = $dom->createElement('a');
				$href = $dom->createAttribute('href');
				$href->value = $link->url;
				$a->appendChild($href);
			$t  = $dom->createTextNode($link->title);

			if ($link->class)
			{
				$class = $dom->createAttribute('class');
				$class->value = $link->class;
				$li->appendChild($class);
			}

			if ($link->converted_target())
			{
				$target = $dom->createAttribute('target');
				$target->value = $link->converted_target();
				$a->appendChild($target);
			}

			$a->appendChild($t);
			$li->appendChild($a);
			
			if ($link->subtitle)
			{
				$s = $dom->createElement('small');
				$s->appendChild($dom->createTextNode($link->subtitle));
				$a->appendChild($s);
			}
			
			return $li;	
		};

		foreach ($group->links as $link)
		{
			$element = $build_link($link);

			// If there are subitems
			if (count($links = $link->links) > 0)
			{
				$list2 = $dom->createElement('ul');

				foreach ($links as $link2)
				{
					$element2 = $build_link($link2);
					$list2->appendChild($element2);
				}
				
				$element->appendChild($list2);
			}

			$list->appendChild($element);
		}
		
		$dom->appendChild($list);
		$dom->formatOutput = true;

		return str_replace('<?xml version="1.0"?>', '', $dom->saveXML());
	}
}
<?php

class Controller_Pages extends Controller_Template
{
	public $template = 'modal';

	public function before()
	{
		parent::before();

		$site = Model_Site::find_or_create_current();
		$config = array(
			'active' => $site->theme,
			'fallback' => 'default',
			'paths' => array(DOCROOT.'themes'),
			'assets_folder' => 'assets',
			'view_ext' => '.php',
			'require_info_file' => true,
			'info_file_name' => 'theme.info',
			'info_file_type' => 'json',
		);

		$theme = Theme::forge($config);
		$theme->active($site->theme);
		$this->template->set_global('theme', $theme);
	}

	public function action_index()
	{
		$data['pages'] = Model_Page::find('all', array(
			'order_by' => 'title',
			'where' => array('site_id' => Model_Site::find_or_create_current())
		));
		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/index', $data);
	}

	public function action_sitemap()
	{
		$pages = Model_Page::find('all', array(
			'order_by' => 'uri',
			'where' => array(
				array('site_id' => Model_Site::find_or_create_current()),
				array('hidden' => 2)
			)
		));
		$pages = array(Model_Page::forge(array(
			'uri' => '/',
			'updated_at' => time(),
			'priority' => 10,
			'changes' => 3, // Daily
		))) + $pages;
		
		$xml = new \DOMDocument();
		$xml->formatOutput = true;
		
		// Setup root element
		$root = $xml->createElement("urlset");
			$attr = $xml->createAttribute('xmlns');
			$attr->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
			$root->appendChild($attr);
			$xml->appendChild($root);

		foreach($pages as $page)
		{
			$url = $xml->createElement('url');
				$root->appendChild($url);
				
			// Loc
			$loc = $xml->createElement('loc');
			$txt = $xml->createTextNode(Uri::create($page->uri));
				$loc->appendChild($txt);
				$url->appendChild($loc);

			// Lastmod
			$lastmod = $xml->createElement('lastmod');
			$txt = $xml->createTextNode($page->sitemap_date());
				$lastmod->appendChild($txt);
				$url->appendChild($lastmod);

			// Changefreq
			$changefreq = $xml->createElement('changefreq');
			$txt = $xml->createTextNode($page->change_frequency());
				$changefreq->appendChild($txt);
				$url->appendChild($changefreq);

			// Priority
			$priority = $xml->createElement('priority');
			$txt = $xml->createTextNode($page->sitemap_priority());
				$priority->appendChild($txt);
				$url->appendChild($priority);
			
			unset($loc, $lastmod, $changefreq, $priority);
		}

		Response::forge($xml->saveXml())
			->set_header('Content-Type', 'text/xml')
			->send(true);
		exit;
	}

	public function action_view($id = null)
	{
		$data['page'] = Model_Page::find($id);
		$this->template->title = 'Viewing: ' . $data['page']->title;
		$this->template->content = View::forge('pages/view', $data);
	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Page::validate('create');
			
			if ($val->run())
			{
				$page = Model_Page::forge(array(
					'title' => Input::post('title'),
					'subtitle' => Input::post('subtitle'),
					'uri' => Input::post('uri'),
					'keywords' => Input::post('keywords'),
					'description' => Input::post('description'),
					'site_id' => Input::post('site_id'),
					'layout_id' => Input::post('layout_id'),
					'priority' => Input::post('priority'),
					'changes' => Input::post('changes'),
					'hidden' => Input::post('hidden'),
				));
				
				if ($page and $page->save())
				{
					Session::set_flash('success', 'Added ' . $page->title . '.');
					Response::redirect('pages');
				}
				else
				{
					Session::set_flash('error', 'Could not save page.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}
		
		$this->template->title   = 'New Page';
		$this->template->content = View::forge('pages/create');
	}

	public function action_edit($id = null)
	{
		$page = Model_Page::find($id);
		$val  = Model_Page::validate('edit');
		
		if ($val->run())
		{
			$page->title       = Input::post('title');
			$page->subtitle    = Input::post('subtitle');
			$page->uri         = Input::post('uri');
			$page->keywords    = Input::post('keywords');
			$page->description = Input::post('description');
			$page->site_id     = Input::post('site_id');
			$page->layout_id   = Input::post('layout_id');
			$page->priority    = Input::post('priority');
			$page->changes     = Input::post('changes');
			$page->hidden      = Input::post('hidden');

			if ($page->save())
			{
				Session::set_flash('success', 'Updated ' . $page->title);
				Response::redirect('pages');
			}
			else
			{
				Session::set_flash('error', 'Could not update ' . $page->title);
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$page->title       = $val->validated('title');
				$page->uri         = $val->validated('uri');
				$page->description = $val->validated('description');
				$page->site_id     = $val->validated('site_id');
				$page->layout_id   = $val->validated('layout_id');
				$page->priority    = Input::post('priority');
				$page->changes     = Input::post('changes');
				$page->hidden      = Input::post('hidden');
				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('page', $page, false);
		}
		
		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/edit');
	}

	public function action_delete($id = null)
	{
		if ($page = Model_Page::find($id))
		{
			$page->delete();
			Session::set_flash('success', 'Deleted '.$page->title);
		}
		else
		{
			Session::set_flash('error', 'Could not delete '.$page->title);
		}
		
		Response::redirect('pages');
	}
}
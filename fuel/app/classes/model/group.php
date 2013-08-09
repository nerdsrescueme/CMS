<?php

class Model_Group extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'level',
		'is_admin',
	);

	public static function get_groups()
	{
		$groups = static::find('all');
		$out = [0 => ""];

		foreach ($groups as $group)
		{
			$out[$group->id] = $group->name;
		}

		return $out;
	}
}
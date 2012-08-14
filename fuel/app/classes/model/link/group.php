<?php

use Orm\Model;

class Model_Link_Group extends Model
{
	protected static $_properties = array(
		'id',
		'site_id',
		'identifier',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array('links');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'site' => array(
			'events' => array('before_save'),
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		//$val->add_field('site_id', 'Site Id', 'required');
		$val->add_field('identifier', 'Identifier', 'required|max_length[32]');

		return $val;
	}
	
	public static function find_with_parent_links()
	{
		return static::find()
			->related('links')
			->where('t1.parent_id', 0)
			->order_by('t1.position')
			->get_one();
	}

}

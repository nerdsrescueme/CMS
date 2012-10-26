<?php

use Orm\Model;

class Model_Html extends Model
{
	protected static $_belongs_to = array('page');

	protected static $_properties = array(
		'id',
		'site_id' => array(
			'data_type' => 'int',
			'label' => 'Site',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('type' => false),
		),
		'page_id' => array(
			'data_type' => 'int',
			'label' => 'Page',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('type' => false),
		),
		'key' => array(
			'data_type' => 'char',
			'label' => 'Key',
			'validation' => array('required', 'max_length' => 32),
			'form' => array('type' => false),
		),
		'data' => array(
			'data_type' => 'text',
			'label' => 'Data',
			'validation' => array('required', 'min_length' => 1),
			'form' => array('type' => false),
		),
		'created_at' => array('data_type' => 'int', 'label' => 'Created', 'form' => array('type' => false)),
		'updated_at' => array('data_type' => 'int', 'label' => 'Updated', 'form' => array('type' => false)),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
	
	public static function find_by_page_and_key($page, $key)
	{
		$site = Model_Site::find_or_create_current();

		return static::find('first', array(
			'where' => array(
				array('site_id', $site),
				array('page_id', $page),
				array('key', $key)
			)
		));
	}
	
	public static function find_globals()
	{
		$site = Model_Site::find_or_create_current();

		return static::find('all', array(
			'where' => array(
				array('site_id', $site),
				array('page_id', 0)
			)
		));
	}
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('key', 'Key', 'required|max_length[32]');
		$val->add_field('data', 'Data', 'required|min_length[1]');
		$val->add_field('page_id', 'Page', 'required|valid_string[numeric]');

		return $val;
	}
}

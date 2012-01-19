<?php

class Model_Site extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'host' => array(
			'data_type' => 'char',
			'label' => 'Site Hostname',
			'validation' => array('required', 'min_length' => 6, 'max_length' => 120),
			'form' => array('data_type' => 'text'),
		),
		'theme' => array(
			'data_type' => 'char',
			'label' => 'Site Theme',
			'validation' => array('required', 'min_length' => 3, 'max_length' => 36),
			'form' => array('data_type' => 'text'),
		)
	);

	public static function find_or_create_current()
	{
		$host = Input::server('http_host');

		if($site = static::find_by_host($host))
		{
			return $site;
		}

		$site = new static(array(
			'host' => $host,
			'theme' => 'default',
		));

		return $site->save() ? $site : false;
	}
}


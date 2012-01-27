<?php
use Orm\Model;

class Model_Note extends Model
{
	protected static $_properties = array(
		'id',
		'uri',
		'content',
		'created_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('uri', 'Uri', 'max_length[255]');
		$val->add_field('content', 'Content', 'required|max_length[255]');

		return $val;
	}

}

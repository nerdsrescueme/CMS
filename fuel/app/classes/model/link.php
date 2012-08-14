<?php
use Orm\Model;

class Model_Link extends Model
{
	public static $targets = array(
		1 => 'Default',
		2 => 'Blank',
	);

	protected static $_properties = array(
		'id',
		'link_group_id',
		'parent_id',
		'title',
		'subtitle',
		'url',
		'class',
		'target',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array('links' => array(
		'model_to' => 'Model_Link',
		'key_from' => 'id',
		'key_to'   => 'parent_id',
	));

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

	public function converted_target()
	{
		switch($this->target)
		{
			case 2:
				return '_blank';
				break;
			case 1:
			default:
				return null;
		}
	}

	public function to_link()
	{
		$class  = $this->class  ? " class=\"{$this->class}\"" : '';
		$target = $this->converted_target() ? " class=\"{$this->converted_target()}\"" : '';
		$url    = $this->url ?: '#';
		
		return "<li{$class}><a href=\"{$url}\"{$target}>{$this->title}</a></li>";
	}

	public static function get_targets()
	{
		return static::$targets;
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('link_group_id', 'Link Group Id', 'required');
		//$val->add_field('parent_id', 'Parent Id', 'required');
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('subtitle', 'Subtitle', 'max_length[32]');
		$val->add_field('url', 'Url', 'required|max_length[255]');
		$val->add_field('class', 'Class', 'max_length[255]');
		$val->add_field('target', 'Target', 'required');

		return $val;
	}

}

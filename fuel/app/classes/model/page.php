<?php
use Orm\Model;
//insert into pages (uri,title,description,site_id,layout_id,created_at,updated_at) values ('test', 'Test Page', 'Description of test page', 1, 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP());
class Model_Page extends Model
{
	protected static $_has_many = array('htmls');

	protected static $_properties = array(
		'id',
		'title' => array(
			'data_type' => 'char',
			'label' => 'Title',
			'validation' => array('required', 'min_length' => 4, 'max_length' => 120),
			'form' => array('data_type' => 'text'),
		),
		'subtitle' => array(
			'data_type' => 'char',
			'label' => 'Subtitle',
			'validation' => array('max_length' => 120),
			'form' => array('data_type' => 'text'),
		),
		'uri' => array(
			'data_type' => 'char',
			'label' => 'URI',
			'validation' => array('required', 'min_length' => 3, 'max_length' => 255),
			'form' => array('data_type' => 'text'),
		),
		'keywords' => array(
			'data_type' => 'char',
			'label' => 'Keywords',
			'validation' => array('max_length' => 255),
			'form' => array('data_type' => 'text'),
		),
		'description' => array(
			'data_type' => 'text',
			'label' => 'Description',
			//'validation' => array('required', 'min_length' => 4, 'max_length' => 120),
			'form' => array('data_type' => 'textarea'),
		),
		'site_id' => array(
			'data_type' => 'int',
			'label' => 'Site',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('type' => false),
		),
		'layout_id' => array(
			'data_type' => 'char',
			'label' => 'Layout',
			'validation' => array('required', 'max_length' => 120),
			'form' => array('data_type' => 'text'),
		),
		'group_id' => array(
			'data_type' => 'int',
			'label' => 'Group ID',
			'validation' => array('valid_string' => 'numeric'),
			'form' => array('data_type' => 'text'),
		),
		'priority' => array(
			'data_type' => 'int',
			'label' => 'Priority',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('data_type' => 'text'),
		),
		'changes' => array(
			'data_type' => 'int',
			'label' => 'Change Frequency',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('data_type' => 'text'),
		),
		'hidden' => array(
			'data_type' => 'int',
			'label' => 'Hidden',
			'validation' => array('required', 'valid_string' => 'numeric'),
			'form' => array('data_type' => 'text'),
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

	public static function find_current()
	{
		$query = static::find()->where('uri', CMS::uri())->where('site_id', Model_Site::find_or_create_current()->id);
		
		return $query->get_one();
	}

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|min_length[4]|max_length[120]');
		$val->add_field('subtitle', 'Subtitle', 'max_length[120]');
		$val->add_field('uri', 'URI', 'required|min_length[3]|max_length[255]');
		$val->add_field('keywords', 'Keywords', 'max_length[255]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('site_id', 'Site Id', 'required|valid_string[numeric]');
		$val->add_field('layout_id', 'Layout Id', 'required');
		$val->add_field('priority', 'Priority', 'valid_string[numeric]');
		$val->add_field('changes', 'Change Frequency', 'valid_string[numeric]');
		$val->add_field('hidden', 'Hidden', 'valid_string[numeric]');
		$val->add_field('group_id', 'Group ID', 'valid_string[numeric]');

		return $val;
	}

	public function sitemap_date()
	{
		return date('Y-m-d', $this->updated_at);
	}

	public function sitemap_priority()
	{
		return (float) $this->priority/10;
	}

	public function change_frequency()
	{
		switch ($this->changes)
		{
			case 1:
				return 'always';
				break;
			case 2:
				return 'hourly';
				break;
			case 3:
				return 'daily';
				break;
			case 4:
				return 'weekly';
				break;
			case 5:
				return 'monthly';
				break;
			case 6:
				return 'yearly';
				break;
			case 7:
				return 'never';
				break;
			default:
				return 'weekly';
		}		
	}
}

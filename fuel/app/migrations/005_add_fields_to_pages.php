<?php

namespace Fuel\Migrations;

class Add_fields_to_pages
{
	public function up()
	{
    	\DBUtil::add_fields('pages', array(
			'subtitle' => array('constraint' => 120, 'type' => 'varchar'),
			'keywords' => array('constraint' => 255, 'type' => 'varchar'),
    	));	
	}

	public function down()
	{
    	\DBUtil::drop_fields('pages', array(
			'subtitle', 'keywords'
    	));
	}
}
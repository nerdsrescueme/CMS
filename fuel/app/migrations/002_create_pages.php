<?php

namespace Fuel\Migrations;

class Create_pages
{
	public function up()
	{
		\DBUtil::create_table('pages', array(
			'id' => array('constraint' => 5, 'type' => 'int', 'auto_increment' => true),
			'uri' => array('constraint' => 255, 'type' => 'char'),
			'title' => array('constraint' => 120, 'type' => 'char'),
			'description' => array('type' => 'text'),
			'site_id' => array('constraint' => 2, 'type' => 'int'),
			'layout_id' => array('constraint' => 120, 'type' => 'char'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pages');
	}
}
<?php

namespace Fuel\Migrations;

class Create_links
{
	public function up()
	{
		\DBUtil::create_table('links', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'link_group_id' => array('constraint' => 11, 'type' => 'int'),
			'parent_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'url' => array('constraint' => 255, 'type' => 'varchar'),
			'class' => array('constraint' => 255, 'type' => 'varchar'),
			'target' => array('constraint' => 1, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('links');
	}
}
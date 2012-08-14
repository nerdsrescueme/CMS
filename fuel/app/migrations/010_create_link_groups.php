<?php

namespace Fuel\Migrations;

class Create_link_groups
{
	public function up()
	{
		\DBUtil::create_table('link_groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'site_id' => array('constraint' => 11, 'type' => 'int'),
			'identifier' => array('constraint' => 32, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('link_groups');
	}
}
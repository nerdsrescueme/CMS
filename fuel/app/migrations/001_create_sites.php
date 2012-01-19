<?php

namespace Fuel\Migrations;

class Create_sites
{
	public function up()
	{
		\DBUtil::create_table('sites', array(
			'id' => array('constraint' => 2, 'type' => 'int', 'auto_increment' => true),
			'host' => array('constraint' => 120, 'type' => 'char'),
			'theme' => array('constraint' => 36, 'type' => 'char', 'default' => 'default'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sites');
	}
}
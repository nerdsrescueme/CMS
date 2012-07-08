<?php

namespace Fuel\Migrations;

class Create_htmls
{
	public function up()
	{
		\DBUtil::create_table('htmls', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'page_id' => array('constraint' => 11, 'type' => 'int', 'default' => 0),
			'key' => array('constraint' => 32, 'type' => 'varchar'),
			'data' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('htmls');
	}
}
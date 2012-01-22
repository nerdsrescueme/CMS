<?php

namespace Fuel\Migrations;

class Create_notes
{
	public function up()
	{
		\DBUtil::create_table('notes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'uri' => array('constraint' => 255, 'type' => 'varchar'),
			'content' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int')
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('notes');
	}
}
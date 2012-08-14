<?php

namespace Fuel\Migrations;

class Add_position_to_links
{
	public function up()
	{
		\DBUtil::add_fields('links', array(
			'position' => array('constraint' => 3, 'type' => 'int', 'default' => 0),
		));

		\DBUtil::add_fields('link_groups', array(
			'position' => array('constraint' => 3, 'type' => 'int', 'default' => 0),
		));
		
		\DB::update('links')->set(array(
			'position' => 0
		))->execute();
		
		\DB::update('link_groups')->set(array(
			'position' => 0
		))->execute();
	}

	public function down()
	{
		\DBUtil::drop_fields('links', array(
			'position'
		));

		\DBUtil::drop_fields('link_groups', array(
			'position'
		));
	}
}
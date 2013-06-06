<?php

namespace Fuel\Migrations;

class Add_group_id_to_pages
{
	public function up()
	{
    \DBUtil::add_fields('pages', array(
		'group_id' => array('type' => 'int'),
    ));	
	}

	public function down()
	{
    \DBUtil::drop_fields('pages', array(
		'group_id',
    ));
	}
}
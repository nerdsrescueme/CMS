<?php

namespace Fuel\Migrations;

class Add_hidden_to_pages
{
	public function up()
	{
    \DBUtil::add_fields('pages', array(
		'hidden' => array('constraint' => 1, 'type' => 'integer'),
    ));	
	}

	public function down()
	{
    \DBUtil::drop_fields('pages', array(
		'hidden',
    ));
	}
}
<?php

namespace Fuel\Migrations;

class Add_sitemap_fields
{
	public function up()
	{
    \DBUtil::add_fields('pages', array(
		'priority' => array('constraint' => 2, 'type' => 'integer'),
		'changes'  => array('constraint' => 1, 'type' => 'integer'),
    ));	
	}

	public function down()
	{
    \DBUtil::drop_fields('pages', array(
		'priority',
		'changes',
    ));
	}
}
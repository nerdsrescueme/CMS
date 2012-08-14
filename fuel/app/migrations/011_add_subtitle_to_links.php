<?php

namespace Fuel\Migrations;

class Add_subtitle_to_links
{
	public function up()
	{
    \DBUtil::add_fields('links', array(
		'subtitle' => array('constraint' => 32, 'type' => 'varchar'),
    ));	
	}

	public function down()
	{
    \DBUtil::drop_fields('links', array(
		'subtitle',
    ));
	}
}
<?php

namespace Fuel\Migrations;

class Add_site_id_to_htmls
{
	public function up()
	{
		\DBUtil::add_fields('htmls', array(
			'site_id' => array('constraint' => 11, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('htmls', array(
			'site_id'
		));
	}
}
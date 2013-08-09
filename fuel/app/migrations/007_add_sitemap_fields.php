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
    
    \DB::update('pages')->value('priority', 5)->execute();
    \DB::update('pages')->value('changes', 4)->execute();
	}

	public function down()
	{
    \DBUtil::drop_fields('pages', array(
		'priority',
		'changes',
    ));
	}
}
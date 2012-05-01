<?php

class Controller_Test extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Test &raquo; Index';
		$this->template->content = View::forge('test/index');
	}

}

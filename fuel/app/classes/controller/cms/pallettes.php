<?php

class Controller_Cms/pallette extends Controller_Template
{

	public function action_backcolor()
	{
		$this->template->title = 'Cms/pallettes &raquo; Backcolor';
		$this->template->content = View::forge('cms/pallettes/backcolor');
	}

	public function action_forecolor()
	{
		$this->template->title = 'Cms/pallettes &raquo; Forecolor';
		$this->template->content = View::forge('cms/pallettes/forecolor');
	}

}

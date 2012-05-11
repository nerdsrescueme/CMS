<?php

class Controller_Finder extends Controller_Template
{
	public $template = "modal";

	public function action_index()
	{
		$this->template->noheader = true;
		$this->template->title = 'Finder - File Manager';
		$this->template->content = View::forge('finder/index');
	}

}

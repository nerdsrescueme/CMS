<?php

class Controller_Cms/lightview extends Controller_Template
{

	public function action_about()
	{
		$this->template->title = 'Cms/lightviews &raquo; About';
		$this->template->content = View::forge('cms/lightviews/about');
	}

}

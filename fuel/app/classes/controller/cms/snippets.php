<?php

class Controller_Cms/snippet extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Cms/snippets &raquo; Index';
		$this->template->content = View::forge('cms/snippets/index');
	}

}

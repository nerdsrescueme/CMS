<?php

class Controller_Cms/panel extends Controller_Template
{

	public function action_history()
	{
		$this->template->title = 'Cms/panels &raquo; History';
		$this->template->content = View::forge('cms/panels/history');
	}

	public function action_notes()
	{
		$this->template->title = 'Cms/panels &raquo; Notes';
		$this->template->content = View::forge('cms/panels/notes');
	}

	public function action_snippets()
	{
		$this->template->title = 'Cms/panels &raquo; Snippets';
		$this->template->content = View::forge('cms/panels/snippets');
	}

}

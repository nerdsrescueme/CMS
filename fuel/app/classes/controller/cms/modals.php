<?php

class Controller_Cms/modal extends Controller_Template
{

	public function action_character()
	{
		$this->template->title = 'Cms/modals &raquo; Character';
		$this->template->content = View::forge('cms/modals/character');
	}

	public function action_htmleditor()
	{
		$this->template->title = 'Cms/modals &raquo; Htmleditor';
		$this->template->content = View::forge('cms/modals/htmleditor');
	}

	public function action_link()
	{
		$this->template->title = 'Cms/modals &raquo; Link';
		$this->template->content = View::forge('cms/modals/link');
	}

	public function action_media()
	{
		$this->template->title = 'Cms/modals &raquo; Media';
		$this->template->content = View::forge('cms/modals/media');
	}

	public function action_table()
	{
		$this->template->title = 'Cms/modals &raquo; Table';
		$this->template->content = View::forge('cms/modals/table');
	}

}

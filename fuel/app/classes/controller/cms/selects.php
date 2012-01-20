<?php

class Controller_Cms/select extends Controller_Template
{

	public function action_formatblock()
	{
		$this->template->title = 'Cms/selects &raquo; Formatblock';
		$this->template->content = View::forge('cms/selects/formatblock');
	}

	public function action_style()
	{
		$this->template->title = 'Cms/selects &raquo; Style';
		$this->template->content = View::forge('cms/selects/style');
	}

}

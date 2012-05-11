<?php

class Controller_Cms_Modals extends Controller
{
	public function action_finder()
	{
		return Response::forge(View::forge('cms/modals/finder'));
	}

	public function action_pages()
	{
		return Response::forge(View::forge('cms/modals/pages'));
	}
}

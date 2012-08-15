<?php

class Controller_Cms_Pallettes extends Controller
{
	public function action_backcolor()
	{
		return Response::forge(View::forge('cms/pallettes/backcolor'));
	}

	public function action_forecolor()
	{
		return Response::forge(View::forge('cms/pallettes/forecolor'));
	}

	public function action_image()
	{
		return Response::forge(View::forge('cms/pallettes/image'));
	}
}

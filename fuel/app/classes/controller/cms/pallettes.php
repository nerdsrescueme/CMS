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

	public function action_video()
	{
		return Response::forge(View::forge('cms/pallettes/video'));
	}

	public function action_a()
	{
		return Response::forge(View::forge('cms/pallettes/a'));
	}

	public function action_block()
	{
		return Response::forge(View::forge('cms/pallettes/block'));
	}

	public function action_source()
	{
		return Response::forge(View::forge('cms/pallettes/source'));
	}
}

<?php

class Controller_Cms_Modals extends Controller
{
	public function action_uploader()
	{
		return Response::forge(View::forge('cms/modals/uploader'));
	}
}

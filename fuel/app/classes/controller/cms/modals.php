<?php

class Controller_Cms_Modals extends Controller {

	public function action_character() {
		return Response::forge(View::forge('cms/modals/character'));
	}

	public function action_htmleditor() {
		return Response::forge(View::forge('cms/modals/htmleditor'));
	}

	public function action_link() {
		return Response::forge(View::forge('cms/modals/link'));
	}

	public function action_media() {
		return Response::forge(View::forge('cms/modals/media'));
	}

	public function action_table() {
		return Response::forge(View::forge('cms/modals/table'));
	}
}

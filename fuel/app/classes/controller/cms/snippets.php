<?php

class Controller_Cms_Snippets extends Controller {

	public function action_options($snippet) {
		return Response::forge(View::forge('cms/snippets/options_test'));
	}

	public function action_preview($snippet) {
		return Response::forge(View::forge('cms/snippets/preview_test'));
	}
}

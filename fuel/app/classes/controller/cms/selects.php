<?php

class Controller_Cms_Selects extends Controller {

	public function action_formatblock() {
		return Response::forge(View::forge('cms/selects/formatblock'));
	}

	public function action_style() {
		return Response::forge(View::forge('cms/selects/style'));
	}
}

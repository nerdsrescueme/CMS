<?php

class Controller_Cms_Lightviews extends Controller {

	public function action_about() {
		return Response::forge(View::forge('cms/lightviews/about'));
	}
}

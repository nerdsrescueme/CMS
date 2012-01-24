<?php

class Controller_Cms_Panels extends Controller
{

	public function action_history()
	{
		return Response::forge(View::forge('cms/panels/history'));
	}

	public function action_notes()
	{
		$data['uri']   = trim(parse_url(Input::referrer(), PHP_URL_PATH), '/');
		$data['notes'] = Model_Note::find('all', array('where' => array('uri' => $data['uri'])));

		return Response::forge(View::forge('cms/panels/notes', $data));
	}

	public function action_pages()
	{
		$data['uri'] = trim(parse_url(Input::referrer(), PHP_URL_PATH), '/');

		return Response::forge(View::forge('cms/panels/pages'));
	}

	public function action_snippets()
	{
		return Response::forge(View::forge('cms/panels/snippets'));
	}
}

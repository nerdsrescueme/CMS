<?php

class Controller_Base_Cms extends Controller
{
	public $template;
	public $site;
	protected $logged_in = false;

	public function before()
	{
		$this->site     = Model_Site::find_or_create_current();
		$this->template = Theme::instance()->view('template');
		$theme          = Theme::instance()->active();

		// Setup assets
		Asset::add_path('themes/'.$theme['name'].'/assets/');

		return parent::before();
	}

	public function after($response)
	{
		// CMS pages return a response, display it directly.
		if ($response instanceof Response)
		{
			return $response;
		}

		// If AJAX, return the content without the layout
		$body = Input::is_ajax() ? $this->template->content : $this->template;

		// If the user is an admin...
		if (Sentry::check() and Sentry::user()->is_admin())
		{
			$body = str_replace('</head>', View::forge('cms/admin').PHP_EOL.'</head>', $body);
		}
		else
		{
			$body = CMS::clean_output($body);
		}

		$this->response->body = $body;

		return parent::after($this->response);
	}
}
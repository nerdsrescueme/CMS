<?php

class Controller_Base_Cms extends Controller
{
	public $template;
	public $site;

	public function before()
	{
		$this->site     = Model_Site::find_or_create_current();
		$this->template = Theme::instance()->view('template');
		$theme          = Theme::instance()->active();

		// Add information to views
		$this->template->set_global('site', $this->site);
		$this->template->set_global('layout', false);
		$this->template->set_global('page', Model_Page::forge()); // Blank page object for pages with no data

		// Setup assets
		Asset::add_path('themes/'.$theme['name'].'/assets/');

		return parent::before();
	}

	public function after($response)
	{
		// If AJAX, return the content without the layout
		$body = Input::is_ajax() ? $this->template->content : $this->template;

		// If the user is an admin...
		if (Sentry::check() and Sentry::user()->is_admin())
		{
			$body = str_replace('</body>', '</body>'.View::forge('cms/admin'), $body);
		}
		else
		{
			$body = CMS::clean_output($body);
		}

		$this->response->body = $body;

		return parent::after($this->response);
	}
}
<?php

class TempUser
{
	public function is_admin() { return false; }
}

class Controller_Cms extends Controller
{

	public $site;
	public $user;
	public $theme;
	public $template;

	public function action_home()
	{
		$this->template->content = $this->theme->view('home');
	}

	public function action_catch()
	{
		if ( ! $page = Model_Page::find_current())
		{
			$this->response->set_status(404);
			$this->template->content = $this->theme->view('404');
			return;
		}
		$this->template->content = 'Content for page ['.$page->title.'].';
	}

	public function action_login()
	{
		if (Input::method() === 'POST')
		{
			Session::set_flash('success', 'Welcome, you have successfully logged in.');
			return Response::redirect('/');
		}

		return Response::forge(View::forge('cms/login'));
	}

	public function action_logout()
	{
		return Response::redirect('/');
	}

	public function before()
	{
		$this->site     = Model_Site::find_or_create_current();
		$this->user     = new TempUser();
		$this->theme    = Theme::instance();
		$this->template = $this->theme->view('template');
		$active_theme   = $this->theme->active();
		Asset::add_path('themes/'.$active_theme['name'].'/assets/');
		return parent::before();
	}

	public function after($response)
	{
		if ($response instanceof Response)
		{
			return $response;
		}

		// If AJAX, return the content without the layout
		$body = Input::is_ajax() ? $this->template->content : $this->template;

		if ($this->user and $this->user->is_admin())
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

<?php

class Controller_Cms extends Controller_Base_Cms
{

	public $site;
	public $user;
	public $theme;
	public $template;

	public function action_home()
	{
		$this->template->content = Theme::instance()->view('home');
	}

	public function action_catch()
	{
		if ( ! $page = Model_Page::find_current())
		{
			$this->response->set_status(404);
			$this->template->content = Theme::instance()->view('404');
			return;
		}

		$this->template->set_global('page', $page);
		
		// If the page cannot be located in the theme folder, use the
		// CMS default view for that page.
		try
		{
			$this->template->content = Theme::instance()->view($page->layout_id);
		}
		catch(ThemeException $e)
		{
			$this->template->content = View::forge($page->layout_id);
		}

	}

}

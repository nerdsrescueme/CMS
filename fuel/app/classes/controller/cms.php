<?php

class Controller_Cms extends Controller_Base_Cms
{
	public function action_home()
	{
		$page = Model_Page::forge();
		$page->title = 'Welcome';
		$page->subtitle = 'Feel free to browse';

		$this->template->set_global('page', $page);
		$this->template->set_global('layout', 'home');
		$this->template->content = Theme::instance()->view('home');
	}

	public function action_catch()
	{
		if ( ! $page = Model_Page::find_current())
		{
			$page = Model_Page::forge();
			$page->title = 'Error 404';
			$page->subtitle = 'Page Not Found';
			
			$this->response->set_status(404);
			$this->template->set_global('layout', '404');
			$this->template->set_global('page', $page);
			$this->template->content = Theme::instance()->view('404');
			return;
		}

		$this->template->set_global('page', $page);
		$this->template->set_global('layout', 'page'); // Make dynamic
		$this->template->content = Theme::instance()->view($page->layout_id);
	}

}

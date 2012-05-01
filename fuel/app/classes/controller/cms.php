<?php

class Controller_Cms extends Controller_Base_Cms
{
	public function action_home()
	{
		$this->template->set_global('layout', 'home');
		$this->template->content = Theme::instance()->view('home');
	}

	public function action_catch()
	{
		if ( ! $page = Model_Page::find_current())
		{
			$this->response->set_status(404);
			$this->template->set_global('layout', '404');
			$this->template->content = Theme::instance()->view('404');
			return;
		}

		$this->template->set_global('page', $page);
		$this->template->set_global('layout', 'page'); // Make dynamic
		$this->template->content = Theme::instance()->view($page->layout_id);
	}

}

<?php

class Controller_Cms extends Controller_Base_Cms
{
	public function action_home()
	{
		$page = Model_Page::forge();
		$page->title = $this->theme->info('title');
		$page->subtitle = $this->theme->info('subtitle');

		$this->template->set_global('page', $page);
		$this->template->set_global('layout', 'home');
		$this->template->set('content', $this->theme->view('home')->render(), false);
		
		$content = $this->template->render();
		$replacements = Model_Html::find_globals();

		foreach($replacements as $block)
		{
			if (strpos($content, "<!-- start {$block->key} -->") === false) continue;
			
			$start   = substr($content, 0, strpos($content, "<!-- start {$block->key} -->"));
			$end     = substr($content, strpos($content, "<!-- end {$block->key} -->") + strlen("<!-- end {$block->key} -->"));
			$content = $start.$block->data.$end;
		}
		
		return $content;
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
			$this->template->content = $this->theme->view('404');

			$content      = $this->template->render();
			$replacements = Model_Html::find_globals();

			foreach($replacements as $block)
			{
				if (strpos($content, "<!-- start {$block->key} -->") === false) continue;
			
				$start   = substr($content, 0, strpos($content, "<!-- start {$block->key} -->"));
				$end     = substr($content, strpos($content, "<!-- end {$block->key} -->") + strlen("<!-- end {$block->key} -->"));
				$content = $start.$block->data.$end;
			}

			return $content;
	
		}

		$this->template->set_global('page', $page);
		$this->template->set_global('layout', $page->layout_id);
		$this->template->set('content', $this->theme->view($page->layout_id)->render(), false);
		
		if ($page->group_id != 0) {
			if (!Sentry::group_exists((int) $page->group_id)) {
				die('INTERNAL ERROR, PAGE BELONGS TO A NON-EXISTENT GROUP');
			}

			if (!Sentry::check() or !Sentry::group($page->group_id)) {
				Session::set_flash('error', 'You are not permitted to view that page.');
				Response::redirect('/');
			}
		}

		$content      = $this->template->render();
		$replacements = array_merge($page->htmls, Model_Html::find_globals());

		foreach($replacements as $block)
		{
			if (strpos($content, "<!-- start {$block->key} -->") === false) continue;
			
			$start   = substr($content, 0, strpos($content, "<!-- start {$block->key} -->"));
			$end     = substr($content, strpos($content, "<!-- end {$block->key} -->") + strlen("<!-- end {$block->key} -->"));
			$content = $start.$block->data.$end;
		}
		
		return $content;
	}

	public function action_save()
	{
		$data    = Input::post('data');
		$globals = $data['globals'];
		$locals  = $data['locals'];
		$page    = (int) Input::post('page', 0);
		$site    = Model_Site::find_or_create_current();

		foreach ($globals as $key => $value)
		{
			$html = Model_Html::find_by_key($key);
				!$html and $html = Model_Html::forge(); // Create if non-existent

			$html->key     = $key;
			$html->data    = $value;
			$html->page_id = 0; // Globals have page value of 0
			$html->site_id = $site->id;
			$html->save();
		}
		
		foreach ($locals as $key => $value)
		{
			$html = Model_Html::find_by_page_and_key($page, $key);
				!$html and $html = Model_Html::forge(); // Create if non-existent

			$html->key     = $key;
			$html->data    = $value;
			$html->page_id = $page;
			$html->site_id = $site->id;
			$html->save();
		}

		die(json_encode(array('success' => true)));
	}
}

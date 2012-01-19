<?php
class Controller_Pages extends Controller_Admin
{
	public function action_index()
	{
		$data['pages'] = Model_Page::find('all');
		return Response::forge(View::forge('pages/index', $data));

	}

	public function action_view($id = null)
	{
		$data['page'] = Model_Page::find($id);
		return Response::forge(View::forge('pages/view', $data));

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Page::validate('create');
			
			if ($val->run())
			{
				$page = Model_Page::forge(array(
					'title' => Input::post('title'),
					'uri' => Input::post('uri'),
					'description' => Input::post('description'),
					'site_id' => Input::post('site_id'),
					'layout_id' => Input::post('layout_id'),
				));

				if ($page and $page->save())
				{
					Session::set_flash('success', 'Added page #'.$page->id.'.');

					Response::redirect('pages');
				}

				else
				{
					Session::set_flash('error', 'Could not save page.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/create');

	}

	public function action_edit($id = null)
	{
		$page = Model_Page::find($id);
		$val = Model_Page::validate('edit');

		if ($val->run())
		{
			$page->title = Input::post('title');
			$page->uri = Input::post('uri');
			$page->description = Input::post('description');
			$page->site_id = Input::post('site_id');
			$page->layout_id = Input::post('layout_id');

			if ($page->save())
			{
				Session::set_flash('success', 'Updated page #' . $id);

				Response::redirect('pages');
			}

			else
			{
				Session::set_flash('error', 'Could not update page #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$page->title = $val->validated('title');
				$page->uri = $val->validated('uri');
				$page->description = $val->validated('description');
				$page->site_id = $val->validated('site_id');
				$page->layout_id = $val->validated('layout_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('page', $page, false);
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('pages/edit');

	}

	public function action_delete($id = null)
	{
		if ($page = Model_Page::find($id))
		{
			$page->delete();

			Session::set_flash('success', 'Deleted page #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete page #'.$id);
		}

		Response::redirect('pages');

	}


}
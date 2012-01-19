<?php
class Controller_Site extends Controller_Template 
{

	public function action_index()
	{
		$data['sites'] = Model_Site::find('all');
		$this->template->title = "Sites";
		$this->template->content = View::forge('site/index', $data);

	}

	public function action_view($id = null)
	{
		$data['site'] = Model_Site::find($id);

		$this->template->title = "Site";
		$this->template->content = View::forge('site/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Site::validate('create');
			
			if ($val->run())
			{
				$site = Model_Site::forge(array(
					'host' => Input::post('host'),
					'theme' => Input::post('theme'),
				));

				if ($site and $site->save())
				{
					Session::set_flash('success', 'Added site #'.$site->id.'.');

					Response::redirect('site');
				}
				else
				{
					Session::set_flash('error', 'Could not save site.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('site/create');

	}

	public function action_edit($id = null)
	{
		$site = Model_Site::find($id);
		$val = Model_Site::validate('edit');

		if ($val->run())
		{
			$site->host = Input::post('host');
			$site->theme = Input::post('theme');

			if ($site->save())
			{
				Session::set_flash('success', 'Updated site #' . $id);

				Response::redirect('site');
			}
			else
			{
				Session::set_flash('error', 'Could not update site #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$site->host = $val->validated('host');
				$site->theme = $val->validated('theme');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('site', $site, false);
		}

		$this->template->title = "Sites";
		$this->template->content = View::forge('site/edit');

	}

	public function action_delete($id = null)
	{
		if ($site = Model_Site::find($id))
		{
			$site->delete();

			Session::set_flash('success', 'Deleted site #'.$id);
		}
		else
		{
			Session::set_flash('error', 'Could not delete site #'.$id);
		}

		Response::redirect('site');

	}


}
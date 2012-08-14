<?php
class Controller_Link_Groups extends Controller_Template 
{
	public $template = 'modal';

	public function action_index()
	{
		$data['link_groups'] = Model_Link_Group::find('all');
		$this->template->title = "Link_groups";
		$this->template->content = View::forge('link/groups/index', $data);

	}

	public function action_view($id = null)
	{
		$data['link_group'] = Model_Link_Group::find($id);

		$this->template->title = "Link_group";
		$this->template->content = View::forge('link/groups/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Link_Group::validate('create');
			
			if ($val->run())
			{
				$link_group = Model_Link_Group::forge(array(
					//'site_id' => Input::post('site_id'),
					'identifier' => Input::post('identifier'),
				));

				if ($link_group and $link_group->save())
				{
					Session::set_flash('success', 'Added link_group #'.$link_group->id.'.');

					Response::redirect('link/groups');
				}

				else
				{
					Session::set_flash('error', 'Could not save link_group.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Link_Groups";
		$this->template->content = View::forge('link/groups/create');

	}

	public function action_edit($id = null)
	{
		$link_group = Model_Link_Group::find($id);
		$val = Model_Link_Group::validate('edit');

		if ($val->run())
		{
			//$link_group->site_id = Input::post('site_id');
			$link_group->identifier = Input::post('identifier');

			if ($link_group->save())
			{
				Session::set_flash('success', 'Updated link_group #' . $id);

				Response::redirect('link/groups');
			}

			else
			{
				Session::set_flash('error', 'Could not update link_group #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				//$link_group->site_id = $val->validated('site_id');
				$link_group->identifier = $val->validated('identifier');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('link_group', $link_group, false);
		}

		$this->template->title = "Link_groups";
		$this->template->content = View::forge('link/groups/edit');

	}

	public function action_delete($id = null)
	{
		if ($link_group = Model_Link_Group::find($id))
		{
			$link_group->delete();

			Session::set_flash('success', 'Deleted link_group #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete link_group #'.$id);
		}

		Response::redirect('link/groups');

	}


}
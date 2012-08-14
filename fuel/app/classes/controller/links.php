<?php
class Controller_Links extends Controller_Template 
{
	public $template = 'modal';

	public function before()
	{
		parent::before();
		$groups = $this->_get_groups();
		$this->template->set_global('groups', $groups);
	}

	public function action_index()
	{
		$data['links'] = Model_Link::find('all');
		$this->template->title = "Links";
		$this->template->content = View::forge('links/index', $data);
	}

	public function action_view($id = null)
	{
		$data['link'] = Model_Link::find($id);

		$this->template->title = "Link";
		$this->template->content = View::forge('links/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Link::validate('create');
			
			if ($val->run())
			{
				$link = Model_Link::forge(array(
					'link_group_id' => Input::post('link_group_id'),
					'parent_id' => Input::post('parent_id'),
					'title' => Input::post('title'),
					'subtitle' => Input::post('subtitle'),
					'url' => Input::post('url'),
					'class' => Input::post('class'),
					'target' => Input::post('target'),
				));

				if ($link and $link->save())
				{
					Session::set_flash('success', 'Added link #'.$link->id.'.');

					Response::redirect('links');
				}

				else
				{
					Session::set_flash('error', 'Could not save link.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Links";
		$this->template->content = View::forge('links/create');

	}

	public function action_edit($id = null)
	{
		$link = Model_Link::find($id);
		$val = Model_Link::validate('edit');

		if ($val->run())
		{
			$link->link_group_id = Input::post('link_group_id');
			$link->parent_id = Input::post('parent_id');
			$link->title = Input::post('title');
			$link->subtitle = Input::post('subtitle');
			$link->url = Input::post('url');
			$link->class = Input::post('class');
			$link->target = Input::post('target');

			if ($link->save())
			{
				Session::set_flash('success', 'Updated link #' . $id);

				Response::redirect('links');
			}

			else
			{
				Session::set_flash('error', 'Could not update link #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$link->link_group_id = $val->validated('link_group_id');
				$link->parent_id = $val->validated('parent_id');
				$link->title = $val->validated('title');
				$link->subtitle = Input::post('subtitle');
				$link->url = $val->validated('url');
				$link->class = $val->validated('class');
				$link->target = $val->validated('target');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('link', $link, false);
		}

		$this->template->title = "Links";
		$this->template->content = View::forge('links/edit');

	}

	public function action_delete($id = null)
	{
		if ($link = Model_Link::find($id))
		{
			$link->delete();

			Session::set_flash('success', 'Deleted link #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete link #'.$id);
		}

		Response::redirect('links');

	}

	private function _get_groups()
	{
		$groups = Model_Link_Group::find('all');
		$values = array();
		
		array_walk($groups, function($group) use(&$values) {
			$values[$group->id] = $group->identifier;
		});
		
		return $values;
	}
}
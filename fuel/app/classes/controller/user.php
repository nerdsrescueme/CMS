<?php

class Controller_User extends Controller_Base_Cms
{
	public function action_index()
	{
		if (!Sentry::check())
		{
			Response::redirect("user/login");
		}

		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = $this->theme->view('user/index', $data);
	}

	public function action_check()
	{
		$this->template->content = $this->theme->view('user/check');
	}

	public function action_activate($id)
	{
		if (!Sentry::check())
		{
			Response::redirect("user/login");
		}

		$user = Model_User::find($id);
		$user->activated = 1;
		$user->save();

		Response::redirect("user");
	}

	public function action_deactivate($id)
	{
		if (!Sentry::check())
		{
			Response::redirect("user/login");
		}

		$user = Model_User::find($id);
		$user->activated = 0;
		$user->save();

		Response::redirect("user");
	}

	public function action_profile($id)
	{
		if (!Sentry::check())
		{
			Response::redirect("user/login");
		}

		$data = array();

		try
		{
			$user = Sentry::user((int) $id);
		}
		catch(SentryAuthException $e)
		{
			Session::set_flash('success', 'The user profile you requested could not be found.');
			Response::redirect('/');
		}

		$this->template->content = $this->theme->view('user/profile');
	}

	public function action_login()
	{
		$data = array();

		if (Input::method() == 'POST')
		{
			try
			{
				$login = Sentry::login(Input::post('email'), Input::post('password'), Input::post('remember'));
				$theme = Model_Site::find_or_create_current()->get_theme();

				if ($login)
				{
					Session::set_flash('success', 'Welcome, you have successfully logged in.');

					// Special login exception for TBP login redirect.
					if ($theme = "tbp" and Sentry::group_exists(34) and Sentry::group(34)) {
						return Response::redirect('/meeting-planners');
					}

					return Response::redirect('/');
				}
				else
				{
					$data['errors'] = 'Invalid login.';
				}
			}
			catch (SentryAuthException $e)
			{
				$data['errors'] = $e->getMessage();
			}
		}

		$this->template->content = $this->theme->view('user/login', $data, false);
	}

	public function action_logout()
	{
		if (!Sentry::check())
		{
			Response::redirect("user/login");
		}

		Sentry::logout();
		Session::set_flash('success', 'You have successfully logged out.');
		Response::redirect('/');
	}

	public function action_register()
	{
		$data = array();

		if (Input::method() == 'POST')
		{
			$val = Validation::forge('registration');
			$val->add_field('email', 'Email', 'required|valid_email');
			$val->add_field('password', 'Password', 'required');
			$val->add_field('confirm', 'Confirm', 'required|match_field[password]');

			if($val->run())
			{
				try
				{
					$user = Sentry::user()->create(array(
						'email' => Input::post('email'),
						'password' => Input::post('password'),
						'username' => Input::post('username'),
					));

					if ($user)
					{
						return Response::redirect('user/login');
					}
					else
					{
						$data['errors'] = 'Unable to register this account.';
					}
				}
				catch (SentryUserException $e)
				{
					$data['errors'] = $e->getMessage();
				}
			}
			else
			{
				$data['errors'] = $val->show_errors();
			}
		}

		$this->template->content = $this->theme->view('user/register', $data, false);
	}
}

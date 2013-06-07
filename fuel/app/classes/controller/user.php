<?php

class Controller_User extends Controller_Base_Cms
{
	public function action_check()
	{
		$this->template->content = $this->theme->view('user/check');
	}

	public function action_profile($id)
	{
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

	public function action_confirm($email = null, $hash = null)
	{
		$data = array();

		try
		{
			$activate = Sentry::activate_user($email, $hash);
			
			if($activate)
			{
				Session::set_flash('success', 'Your account has been activated, enjoy!');
				return Response::redirect('user/login');
			}
			else
			{
				$data['errors'] = 'Unable to process this request';
			}
		}
		catch (SentryAuthException $e)
		{
			$data['errors'] = $e->getMessage();
		}
		
		$this->template->content = $this->theme->view('user/confirm', $data);
	}

	public function action_login()
	{
		$data = array();

		if (Input::method() == 'POST')
		{
			try
			{
				$login = Sentry::login(Input::post('email'), Input::post('password'), Input::post('remember'));

				if ($login)
				{
					Session::set_flash('success', 'Welcome, you have successfully logged in.');

					if (Sentry::group_exists(34) and Sentry::group(34)) {
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
					$user = Sentry::user()->register(array(
						'email' => Input::post('email'),
						'password' => Input::post('password'),
						'username' => Input::post('username'),
					));
					
					if ($user)
					{
						// Send an email with confirmation information
						Session::set_flash('success', Uri::create('/user/confirm/'.$user['hash'].'/'.$user['hash']));
						
						// Send them to their email to confirm their account.
						return Response::redirect('user/check');
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

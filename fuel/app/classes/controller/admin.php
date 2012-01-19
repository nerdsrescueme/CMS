<?php

class Controller_Admin extends Controller
{
	public function before()
	{
		if(!Input::is_ajax())
		{
			Session::set_flash('info', 'You may only access administration areas from the control bar interface.');
			return Response::redirect('/');
		}

		return parent::before();
	}
}
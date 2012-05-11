<?php

class Controller_Notes extends Controller_Rest
{
	public function post_note()
	{
		$val = Model_Note::validate('create');

		if ($val->run())
		{
			$note = Model_Note::forge(array(
				'uri'     => trim(Input::post('uri'), '/'),
				'content' => Input::post('content'),
			));

			if ($note and $note->save())
			{
				$this->response(array('success' => true, 'id' => $note->id));
			}
			else
			{
				$this->response(array('success' => false));
			}
		}
		else
		{
			$this->response(array('success' => false));
		}
	}

	public function delete_note($id = null)
	{
		if ($note = Model_Note::find($id))
		{
			$note->delete();
			$this->response(array('success' => true));
		}
		else
		{
			$this->response(array('success' => false));
		}
	}
}
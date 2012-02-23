<?php

// CMS Utility class
class CMS {

	protected static $uri;
	
	public static function user_logged_in()
	{
		return Sentry::check() ? Sentry::user() : false;
	}
	
	public static function user_link($user)
	{
		if ($user)
		{
			return Html::anchor('/user/profile/' . $user->get('id'), $user->get('username'));
		}
	}
	
	public static function flash()
	{
		foreach (array('success', 'error', 'info') as $type)
		{
			if ($msg = Session::get_flash($type))
			{
				return array('type' => $type, 'message' => $msg);
			}
		}
	}
	
	public static function uri()
	{
		!static::$uri and static::$uri = new \Uri(\Input::uri());
		return static::$uri;
	}

	public static function clean_output($output)
	{
		$find = array(
			'class="mercury-region"' => '',
			'data-type="editable"' => '',
			' mercury-region' => '',
			'" >' => '">', // This cleans up tags, aesthetics only.
			'"  >' => '">', // This cleans up tags, aesthetics only.
		);

		return str_replace(array_keys($find), array_values($find), $output);
	}
}
<?php

// CMS Utility class
class CMS {

	protected static $uri;
	
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
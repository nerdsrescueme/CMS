<?php

class CMS {

	protected static $uri;
	
	public static function uri()
	{
		!static::$uri and static::$uri = new \Uri(\Input::uri());
		return static::$uri;
	}

}
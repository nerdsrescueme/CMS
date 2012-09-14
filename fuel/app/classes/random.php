<?php

class Random {

	public static function choose()
	{
		$options = func_get_args();

		return $options[array_rand($options)];
	}
}
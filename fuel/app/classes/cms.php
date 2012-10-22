<?php

// CMS Utility class
class CMS {

	protected static $uri;
	
	public static function relative_date($secs)
	{
		$secs = time() - $secs;

		$second = 1;
		$minute = 60;
		$hour   = 60*60;
		$day    = 60*60*24;
		$week   = 60*60*24*7;
		$month  = 60*60*24*7*30;
		$year   = 60*60*24*7*30*365;
	 
		if ($secs <= 0) { $output = "now";
		}elseif ($secs > $second && $secs < $minute) { $output = round($secs/$second)." second";
		}elseif ($secs >= $minute && $secs < $hour) { $output = round($secs/$minute)." minute";
		}elseif ($secs >= $hour && $secs < $day) { $output = round($secs/$hour)." hour";
		}elseif ($secs >= $day && $secs < $week) { $output = round($secs/$day)." day";
		}elseif ($secs >= $week && $secs < $month) { $output = round($secs/$week)." week";
		}elseif ($secs >= $month && $secs < $year) { $output = round($secs/$month)." month";
		}elseif ($secs >= $year && $secs < $year*10) { $output = round($secs/$year)." year";
		}else{ $output = " more than a decade ago"; }
	 
		if ($output <> "now")
		{
			$output = (substr($output,0,2)=="1 ") ? $output." ago" : $output."s ago";
		}

		return $output;

	}
	
	public static function twitter($username, $num_posts)
	{
		try
		{
			$json = Cache::get('twitter-'.$username);
		}
		catch (\CacheNotFoundException $e)
		{
			$json = file_get_contents("https://twitter.com/status/user_timeline/{$username}.json?count={$num_posts}", true);
			Cache::set('twitter-'.$username, $json, 600);
		}

		$json = json_decode($json, true);

		if (!is_array($json))
		{
			$json = array();
		}

		// Autodetect urls
		foreach ($json as $i => $j)
		{
			$json[$i]['text'] = preg_replace("/(http[s]*:\/\/[\S]+)/", "<a href='\${1}'>\${1}</a>", $json[$i]['text']);
		}
		
		return $json;
	}
	
	
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

	public static function inject_output($output)
	{
		// test
	}

	public static function clean_output($output)
	{
		$find = array(
			'data-editable="global"' => '',
			'data-editable="local"' => '',
			'" >' => '">', // This cleans up tags, aesthetics only.
			'"  >' => '">', // This cleans up tags, aesthetics only.
		);

		return str_replace(array_keys($find), array_values($find), $output);
	}
}
<?php

class Theme extends \Fuel\Core\Theme {

	protected $layouts = array();

	public function layouts($assoc = false)
	{die($this->active);
		if(empty($this->layouts))
		{
			$ignore = array('template', '404', 'home');

			foreach(glob($this->active['path'].'*.php') as $file)
			{
				$file = str_replace($this->active['path'], '', $file);
				$file = str_replace('.php', '', $file);

				if(!in_array($file, $ignore))
				{
					$this->layouts []= $file;
				}
			}
		}

		if($assoc)
		{
			$return = array();

			foreach($this->layouts as $layout)
			{
				$return[$layout] = $layout;
			}

			return $return;
		}

		return $this->layouts;
	}
}
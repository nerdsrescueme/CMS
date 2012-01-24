<?php

class Theme extends \Fuel\Core\Theme {

	protected $layouts;

	public function layouts()
	{
		if($this->layouts === null)
		{
			$ignore = array('template', '404');
	
			foreach(glob($this->active['path'].'*.html') as $file)
			{
				$file = str_replace($this->active['path'], '', $file);
				$file = str_replace('.html', '', $file);
	
				if(!in_array($file, $ignore))
				{
					$this->layouts []= $file;
				}
			}
		}

		return $this->layouts;
	}
}
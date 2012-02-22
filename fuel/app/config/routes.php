<?php
return array(
	'_root_'   => 'cms/home',  // The default route
	'_404_'    => 'cms/catch',    // If the page is not found, use db lookup
	
	'user/(:any)' => 'user/$1',
);
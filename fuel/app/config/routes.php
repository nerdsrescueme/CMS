<?php

return array(
	'_root_'   => 'cms/home',  // The default route
	'_404_'    => 'cms/catch',    // If the page is not found, use db lookup

	'sitemap.xml' => 'pages/sitemap',

	'u/(:any)'    => 'user/$1',
	'user/(:any)' => 'user/$1',

	'cms-login'		=> 'user/login',
	'cms-logout'	=> 'user/logout',

	'n'            => 'notes/note',
	'n/(:any)'     => 'notes/note/$1',
	
);
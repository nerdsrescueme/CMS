<?php

namespace Fuel\Migrations;

use \Sentry;

class Add_default_user_groups
{
	public function up()
	{
		Sentry::user()->create(array(
			'username' => 'nerdsrescueme',
			'email' => 'nerd@nerdsrescue.me',
			'password' => 'changeme'
		), false);
		
		Sentry::user()->create(array(
			'username' => 'user',
			'email' => 'user@nerdsrescue.me',
			'password' => 'changeme'
		));

		$super = Sentry::group()->create(array(
			'name' => 'super',
			'level' => 1000,
			'is_admin' => true
		));
		
		Sentry::group()->create(array(
			'name' => 'admin',
			'level' => 900,
			'is_admin' => true
		));
		
		Sentry::group()->create(array(
			'name' => 'editor',
			'level' => 500,
			'is_admin' => true
		));
		
		Sentry::group()->create(array(
			'name' => 'writer',
			'level' => 300,
			'is_admin' => true
		));
		
		Sentry::group()->create(array(
			'name' => 'user',
			'level' => 100
		));
		
		Sentry::group()->create(array(
			'name' => 'guest',
			'level' => 1
		));
		
		Sentry::group()->create(array(
			'name' => 'banned',
			'level' => 0
		));
		
		Sentry::user('nerd@nerdsrescue.me')->add_to_group('super');
		Sentry::user('user@nerdsrescue.me')->add_to_group('user');
	}

	public function down()
	{
		Sentry::user('nerd@nerdsrescue.me')->delete();
		Sentry::group('Super')->delete();
		Sentry::group('Admin')->delete();
		Sentry::group('Editor')->delete();
		Sentry::group('Writer')->delete();
		Sentry::group('User')->delete();
		Sentry::group('Guest')->delete();
		Sentry::group('Banned')->delete();
	}
}
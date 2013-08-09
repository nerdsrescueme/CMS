<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'email',
		'status',
		'activated',
		'created_at',
	);

	public function get_groups()
	{
		$user_groups = Model_User_Group::find('all', array('where' => array('user_id' => $this->id)));
		$groups = [];

		foreach ($user_groups as $user_group)
		{
			$groups[] = Model_Group::find($user_group->group_id);
		}

		return $groups;
	}

	public function get_group_dropdown()
	{
		$groups = $this->get_groups();
		$out = [];

		foreach ($groups as $group)
		{
			$out[$group->id] = $group->name;
		}

		return $out;
	}
}
<?php

class Model_User_Group extends \Orm\Model
{
	protected static $_table_name = "users_groups";
	protected static $_primary_key = array("user_id", "group_id");
	protected static $_properties = array(
		'user_id',
		'group_id',
	);
}
<?php

class Observer_Site extends Orm\Observer
{
	public function before_save($model)
	{
		$model->site_id = Model_Site::find_or_create_current()->id;
	}
}
<?php

class Application_Model_Register
{
	public function createUser($array)
	{
		$db_table = new Application_Model_DbTable_Mailinglist();
		$db_table->insert($array);
	}

}


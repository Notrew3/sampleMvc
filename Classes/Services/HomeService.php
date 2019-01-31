<?php 

/**
 * 
 */
trait HomeService 
{
	
	public function listUserObjects()
	{
		$user = new User();
		$allUsers = $this->getUserData($user->readAll());		
	
		$users = array();

		foreach ($allUsers as $value) {
			$user = $this->userObject($value);
			array_push($users, $user);
		}	
		return $users;
	}
	

	public function getUserData(Array $userDataArray)
	{		
		$users = array();		

		foreach ($userDataArray as $usersData) {
			$userArray = array('id' => json_decode($usersData->id), 'data' => (array) json_decode($usersData->data));
			array_push($users, $userArray);
		}

		return $users;
	}


	public function userObject($array)
	{
		$user = new User();
		$user->setId($array['id']);
		$user->setName($array['data']['name']);

		return $user;
	}

}
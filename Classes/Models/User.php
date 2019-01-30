<?php 


/**
 * 	
 */
class User extends Model
{

	protected $db_table = 'users';
	private $id;
	private $name;

	public function getId():int
	{
		return $this->id;
	}

	public function setId(int $id)
	{
		$this->id = $id;
	}

	public function getName():string
	{
		return $this->name;
	}

	public function setName(String $name)
	{
		$this->name = $name;
	}
	

}
<?php
namespace App\models;

class User extends \App\core\Model{
	public $username;
	public $role;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function isValid(){
		return !empty($this->username);
	}
	
	public function insert(){
		if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO user(username, password_hash, role) 
			Values (:username, :password_hash, :role)"); // these are placeholders

			$stmt-> execute(['username'=>$this->username, 'password_hash'=>$this->password_hash, 
				'role'=>$this->role]);
			return true;
		} else {
			return false;
		}
	}

	public function updatePassword(){
		$stmt = self::$connection->prepare("UPDATE user SET password_hash=:password_hash
			WHERE username=:username");
		$stmt->execute(['password_hash'=>$this->password_hash, 'username'=>$this->username]);

		return true;
	}
	
	public function find($username){
		$stmt = self::$connection-> prepare("SELECT * FROM user WHERE username = :username");
		$stmt-> execute(['username'=>$username]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\User");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}

	public function findUser($user_id){
		$stmt = self::$connection-> prepare("SELECT * FROM user WHERE user_id = :user_id");
		$stmt-> execute(['user_id'=>$user_id]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\User");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}

	public function update2fa(){
		$stmt = self::$connection->prepare("UPDATE user SET secret_key = :secret_key WHERE user_id = :user_id");
		$stmt->execute(['secret_key'=>$this->secret_key, 'user_id'=>$this->user_id]);

		return true;
	}

	public function search($searchWord){
		$stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name = :search 
			OR middle_name = :search OR last_name = :search");
		$stmt-> execute(['search'=>$searchWord]);
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Profile");

		return $stmt->fetchAll();
	}
}
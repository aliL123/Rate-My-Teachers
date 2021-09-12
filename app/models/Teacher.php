<?php
namespace App\models;

class Teacher extends \App\core\Model{
	public $teacher_id;
	public $user_id;
	public $first_name;
	public $last_name;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function getFullName(){
		return "$this->first_name $this->last_name";
	}

	public function getAllTeachers(){
		$stmt = self::$connection-> query("SELECT * FROM teacher ");
		/// property models should match database fields
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Teacher");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetchAll();
	}

	public function insert($user_id){
		$stmt = self::$connection->prepare("INSERT INTO teacher(user_id, first_name, last_name) 
		Values (:user_id, :first_name, :last_name)"); // these are placeholders

		$stmt-> execute(['user_id'=>$user_id, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name]);
	}

	public function find($user_id){
		$stmt = self::$connection-> prepare("SELECT * FROM teacher WHERE user_id = :user_id");
		$stmt-> execute(['user_id'=>$user_id]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Teacher");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}

	public function findTeacher($teacher_id){
		$stmt = self::$connection-> prepare("SELECT * FROM teacher WHERE teacher_id = :teacher_id");
		$stmt-> execute(['teacher_id'=>$teacher_id]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Teacher");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}
	
	public function update(){
		$stmt = self::$connection->prepare("UPDATE teacher set first_name=:first_name, last_name=:last_name WHERE teacher_id=:teacher_id"); // these are placeholders

		$stmt->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'teacher_id'=>$this->teacher_id]);
	}
}
<?php
namespace App\models;

class Student extends \App\core\Model{
	public $student_id;
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

	public function getAllStudents(){
		$stmt = self::$connection-> query("SELECT * FROM student ");
		/// property models should match database fields
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Student");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetchAll();
	}

	public function insert($user_id){
		$stmt = self::$connection->prepare("INSERT INTO student(user_id, first_name, last_name) 
		Values (:user_id, :first_name, :last_name)"); // these are placeholders

		$stmt-> execute(['user_id'=>$user_id, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name]);
	}

	public function find($user_id){
		$stmt = self::$connection-> prepare("SELECT * FROM student WHERE user_id = :user_id");
		$stmt-> execute(['user_id'=>$user_id]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Student");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}

	public function findStudent($profile_id){
		$stmt = self::$connection-> prepare("SELECT * FROM student WHERE student_id = :student_id");
		$stmt-> execute(['student_id'=>$student_id]);
		//PDO php data objects   DB  ---> objects	
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Student");
		//$result = $stmt->fetch()); then $result[first_name] for an array
		return $stmt->fetch();
	}
	
	public function update(){
		$stmt = self::$connection->prepare("UPDATE student set first_name=:first_name, last_name=:last_name WHERE student_id=:student_id"); // these are placeholders

		$stmt->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'student_id'=>$this->student_id]);
	}
}
<?php
namespace App\models;

class Course extends \App\core\Model{
	public $course_id;
	public $course_name;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO course(course_name) 
		Values (:course_name)");

		$stmt-> execute(['course_name'=>$this->course_name]);
	}

	public function delete(){
		$stmt = self::$connection->prepare("DELETE from class where course_id= :course_id");
		$stmt-> execute(['course_id'=>$this->course_id]);

		$stmt = self::$connection->prepare("DELETE from course where course_id= :course_id");
		$stmt-> execute(['course_id'=>$this->course_id]);
	}
	
	public function find($course_id){
		$stmt = self::$connection-> prepare("SELECT * FROM course WHERE course_id = :course_id");
		$stmt-> execute(['course_id'=>$course_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Course");
		return $stmt->fetch();
	}

	public function findAll(){
		$stmt = self::$connection-> query("SELECT * FROM course ");
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Course");
		return $stmt->fetchAll();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE course set course_name=:course_name WHERE course_id=:course_id");

		$stmt->execute(['course_name'=>$this->course_name, 'course_id'=>$this->course_id]);
	}
}
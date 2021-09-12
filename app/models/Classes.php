<?php
namespace App\models;

class Classes extends \App\core\Model{
	public $class_id;
	public $teacher_id;
    public $semester_id;
    public $course_id;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO class(teacher_id, semester_id, course_id) 
		Values (:teacher_id, :semester_id, :course_id)");

		$stmt-> execute(['teacher_id'=>$this->teacher_id, 'semester_id'=>$this->semester_id, 'course_id'=>$this->course_id]);
	}

	public function delete($class_id){
		$stmt = self::$connection->prepare("DELETE from class where class_id= :class_id");
		$stmt-> execute(['class_id'=>$class_id]);
	}
	
	public function find($class_id){
		$stmt = self::$connection-> prepare("SELECT * FROM class WHERE class_id = :class_id");
		$stmt-> execute(['class_id'=>$class_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Classes");
		return $stmt->fetch();
	}

	public function findAll($teacher_id){
		$stmt = self::$connection-> prepare("SELECT * FROM class WHERE teacher_id = :teacher_id");
		$stmt-> execute(['teacher_id'=>$teacher_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Classes");
		return $stmt->fetchAll();
	}

	public function searchClasses($course_name){
		$stmt = self::$connection-> prepare("SELECT * FROM class WHERE course_id = (select course_id from course where course_name = :course_name)");
		$stmt-> execute(['course_name'=>$course_name]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Classes");

		return $stmt->fetchAll();
	}
}
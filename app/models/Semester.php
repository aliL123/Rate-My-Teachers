<?php
namespace App\models;

class Semester extends \App\core\Model{
	public $semester_id;
	public $semester_name;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO semester(semester_name) 
		Values (:semester_name)");

		$stmt-> execute(['semester_name'=>$this->semester_name]);
	}

	public function delete(){
		$stmt = self::$connection->prepare("DELETE from class where semester_id= :semester_id");
		$stmt-> execute(['semester_id'=>$this->semester_id]);

		$stmt = self::$connection->prepare("DELETE from semester where semester_id= :semester_id");
		$stmt-> execute(['semester_id'=>$this->semester_id]);
	}
	
	public function find($semester_id){
		$stmt = self::$connection-> prepare("SELECT * FROM semester WHERE semester_id = :semester_id");
		$stmt-> execute(['semester_id'=>$semester_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Semester");
		return $stmt->fetch();
	}

	public function findAll(){
		$stmt = self::$connection-> query("SELECT * FROM semester ");
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Semester");
		return $stmt->fetchAll();
	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE semester set semester_name=:semester_name WHERE semester_id=:semester_id");

		$stmt->execute(['semester_name'=>$this->semester_name, 'semester_id'=>$this->semester_id]);
	}
}
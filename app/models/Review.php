<?php
namespace App\models;

class Review extends \App\core\Model{
	public $review_id;
	public $class_id;
    public $user_id;
    public $content;
    public $rating;
	
	// goal of having a model is modifiable by the controller
	public function __construct(){
		parent::__construct();
	}

	public function add(){
		$stmt = self::$connection->prepare("INSERT INTO review(class_id, content, user_id, rating) 
		Values (:class_id, :content, :user_id, :rating)");

		$stmt-> execute(['class_id'=>$this->class_id, 'content'=>$this->content, 'user_id'=>$_SESSION['user_id'], 'rating'=>$this->rating]);
	}

	public function delete($review_id){
		$stmt = self::$connection->prepare("DELETE from review where review_id= :review_id");
		$stmt-> execute(['review_id'=>$review_id]);
	}
	
	public function find($review_id){
		$stmt = self::$connection-> prepare("SELECT * FROM review WHERE review_id = :review_id");
		$stmt-> execute(['review_id'=>$review_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Review");
		return $stmt->fetch();
	}

	// public function findAll($teacher_id){
	// 	$stmt = self::$connection-> prepare("SELECT * FROM class WHERE teacher_id = :teacher_id");
	// 	$stmt-> execute(['teacher_id'=>$teacher_id]);
		
	// 	$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Classes");
	// 	return $stmt->fetchAll();
	// }

    public function getAllReviews($class_id){
        $stmt = self::$connection-> prepare("SELECT * FROM review WHERE class_id = :class_id");
		$stmt-> execute(['class_id'=>$class_id]);
		
		$stmt-> setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS,"App\\models\\Review");
        //var_dump($stmt->fetchAll());
		return $stmt->fetchAll();
    }

    public function update(){
		$stmt = self::$connection->prepare("UPDATE review set content=:content, rating=:rating WHERE review_id=:review_id");

		$stmt->execute(['content'=>$this->content, 'rating'=>$this->rating, 'review_id'=>$this->review_id]);
	}
}
<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class ReviewController extends \App\core\Controller{

    // function add(){
    //     if(isset($_POST["action"])){
    //         $user = new \App\models\User();
    //         $user = $user->find($_SESSION['username']);

    //         $class = new \App\models\Classes();
    //         $class-> teacher_id = $_SESSION["teacher_id"];
    //         $class-> semester_id = $_POST["semester_id"];
    //         $class-> course_id = $_POST["course_id"];
    //         $class-> insert();

    //         header("location:".BASE."/Teacher/courses/");
    //     }else{
    //         $this->view('Teacher/addClass');
    //     }
    // }

	// function delete($class_id){
	// 	$class = new \App\models\Classes();
	// 	$class = $class->find($class_id);


	// function edit($class_id){
	// 	$class = new \App\models\Classes();
	// 	$class = $class->find($class_id);
	// 	if(isset($_POST['action'])){//submitting the form
	// 		$class->course_name = $_POST['course_name'];
	// 		$class->update();
	// 		header('location:'.BASE.'/Teacher/classes');
	// 	}else{
	// 		$this->view('Classes/edit',$class);
	// 	}
	// }

    function seeReview($class_id){
        $review = new \App\models\Review();

        $review = $review->getAllReviews($class_id);
        $_SESSION['class_id'] = $class_id;
        $this->view('Student/listReviews', $review);
    }

    function seeReviewTeacher($class_id){
        $review = new \App\models\Review();

        $review = $review->getAllReviews($class_id);
        $_SESSION['class_id'] = $class_id;
        $this->view('Teacher/listReviews', $review);
    }

    function deleteReview($class_id, $review_id){
        $review = new \App\models\Review();
		$review->delete($review_id);
		header("location:".BASE."/Review/seeReview/$class_id");
	}

    function deleteReviewTeacher($class_id, $review_id){
        $review = new \App\models\Review();
		$review->delete($review_id);
		header("location:".BASE."/Review/seeReviewTeacher/$class_id");
	}

    function modifyReview($class_id, $review_id){
        if(isset($_POST["action"])){
			$review = new \App\models\Review();
            $review = $review->find($review_id);
			$review-> content = $_POST["content"];
            $review-> rating = $_POST["rating"];
			$review-> update();
            header("location:".BASE."/Review/seeReview/$class_id");
		}else{
			$review = new \App\models\Review();
			$review = $review->find($review_id);
            
			$this->view('Student/modifyReview', $review);
		}
    }

    function modifyReviewTeacher($class_id, $review_id){
        if(isset($_POST["action"])){
			$review = new \App\models\Review();
            $review = $review->find($review_id);
			$review-> content = $_POST["content"];
            $review-> rating = $_POST["rating"];
			$review-> update();
            header("location:".BASE."/Review/seeReviewTeacher/$class_id");
		}else{
			$review = new \App\models\Review();
			$review = $review->find($review_id);
            
			$this->view('Teacher/modifyReview', $review);
		}
    }

    function leaveReview($class_id){
        if(isset($_POST["action"])){
			$review = new \App\models\Review();
            $review-> class_id = $class_id;
			$review-> content = $_POST["content"];
            $review-> rating = $_POST["rating"];
			$review-> add();
            header("location:".BASE."/Student/backSearchResults");
		}else{
			$this->view('Student/addReview');
		}
    }

    function leaveReviewTeacher($class_id){
        if(isset($_POST["action"])){
			$review = new \App\models\Review();
            $review-> class_id = $class_id;
			$review-> content = $_POST["content"];
            $review-> rating = $_POST["rating"];
			$review-> add();
            header("location:".BASE."/Teacher/courses");
		}else{
			$this->view('Teacher/addReview');
		}
    }
}
?>
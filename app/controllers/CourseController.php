<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class CourseController extends \App\core\Controller{

	function index()
        {
            $course = new \App\models\Course();
            $course = $course->getAll();
            $this->view('Course/listCourses',$course);
        }


	function add(){
		if(isset($_POST["action"])){
			$user = new \App\models\User();

			$course = new \App\models\Course();
			$course-> course_name = $_POST["course_name"];
			$course-> insert();

			header("location:".BASE."/Classes/add");
		}else{
			$this->view('Teacher/addCourse');
		}
	}

	function delete($picture_id){
		$course = new \App\models\Course();
		$course = $course->find($course_id);

		$course->delete();
		$this->view('Teacher/courses');
	}

	function edit($course_id){
		$course = new \App\models\Course();
		$course = $course->find($course_id);
		if(isset($_POST['action'])){//submitting the form
			$course->course_name = $_POST['course_name'];
			$course->update();
			header('location:'.BASE.'/Teacher/courses');
		}else{
			$this->view('Course/edit',$course);
		}
	}
}
?>
<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class ClassesController extends \App\core\Controller{

	function index()
        {
            $class = new \App\models\Classes();
            $class = $class->getAll();
            $this->view('Classes/listClasses',$class);
        }


    function add(){
        if(isset($_POST["action"])){
            $user = new \App\models\User();
            $user = $user->find($_SESSION['username']);

            $class = new \App\models\Classes();
            $class-> teacher_id = $_SESSION["teacher_id"];
            $class-> semester_id = $_POST["semester_id"];
            $class-> course_id = $_POST["course_id"];
            $class-> insert();

            header("location:".BASE."/Teacher/courses/");
        }else{
            $this->view('Teacher/addClass');
        }
    }

	function delete($class_id){
		$class = new \App\models\Classes();
		$class = $class->find($class_id);

		$class->delete($class_id);
		header("location:".BASE."/Teacher/courses/");
	}

	function edit($class_id){
		$class = new \App\models\Classes();
		$class = $class->find($class_id);
		if(isset($_POST['action'])){//submitting the form
			$class->course_name = $_POST['course_name'];
			$class->update();
			header('location:'.BASE.'/Teacher/classes');
		}else{
			$this->view('Classes/edit',$class);
		}
	}
}
?>
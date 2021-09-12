<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class TeacherController extends \App\core\Controller{
	function index(){
		$this->view('Teacher/teacherProfilePage', $_SESSION['username']);
	}

	public function profilePage(){
		$user = new \App\models\User();
		$user = $user->find($_SESSION['username']);

		$teacher = new \App\models\Teacher();
		$teacher = $teacher->find($user->user_id);

		$_SESSION['teacher_id'] = $teacher->teacher_id;
		$_SESSION['first_name'] = $teacher->first_name;
		$_SESSION['last_name'] = $teacher->last_name;
		
		$this->view('Teacher/teacherProfilePage', $_SESSION['username']);
	}

	public function courses(){
		$user = new \App\models\User();
		$user = $user->find($_SESSION['username']);

		$teacher = new \App\models\Teacher();
		$teacher = $teacher->find($user->user_id);

		$_SESSION['teacher_id'] = $teacher->teacher_id;
		$_SESSION['first_name'] = $teacher->first_name;
		$_SESSION['last_name'] = $teacher->last_name;

		$classes = new \App\models\Classes();
		$classes = $classes->findAll($teacher->teacher_id);
		
		$this->view('Teacher/personalCourses', $classes);
	}

	function add(){
		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user = $user->find($_SESSION['username']);

			$teacher = new \App\models\Teacher();
			$teacher-> first_name = $_POST["first_name"];
			$teacher-> last_name = $_POST["last_name"]; 
			$teacher-> insert($user->user_id);

			header("location:".BASE."/Default/somewhereSecure");
		}else{
			$this->view('Teacher/newTeacherForm');
		}
	}

	function editInformation(){
		if(isset($_POST["action"])){
			$teacher = new \App\models\Teacher();
			$teacher-> first_name = $_POST["first_name"];
			$teacher-> last_name = $_POST["last_name"];
			$teacher-> teacher_id = $_SESSION['teacher_id'];
			$teacher-> update();

			$_SESSION['first_name'] = $teacher->first_name;
			$_SESSION['last_name'] = $teacher->last_name;
			header("location:".BASE."/Teacher/index");
		}else{
			$teacher = new \App\models\Teacher();
			$teacher = $teacher->find($_SESSION['teacher_id']);
			$this->view('Teacher/editTeacher', $teacher);
		}
	}
}
?>
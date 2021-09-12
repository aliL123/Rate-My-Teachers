<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class StudentController extends \App\core\Controller{
	function index(){
		$this ->view('Student/studentProfilePage');
	}

	public function profilePage(){
		$user = new \App\models\User();
		$user = $user->find($_SESSION['username']);

		$student = new \App\models\Student();
		$student = $student->find($user->user_id);

		$_SESSION['student_id'] = $student->student_id;
		$_SESSION['first_name'] = $student->first_name;
		$_SESSION['last_name'] = $student->last_name;
		
		$this->view('Student/studentProfilePage', $_SESSION['username']);
	}

	function add(){
		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user = $user->find($_SESSION['username']);

			$student = new \App\models\Student();
			$student-> first_name = $_POST["first_name"];
			$student-> last_name = $_POST["last_name"]; 
			$student-> insert($user->user_id);

			header("location:".BASE."/Default/somewhereSecure");
		}else{
			$this->view('Student/newStudentForm');
		}
	}

	function searchClasses(){
		if(isset($_POST["action"])){
			$classes = new \App\models\Classes();

			$_SESSION['searchWord'] = $_POST["searchWord"];

			$this->view('Student/searchResults', $classes->searchClasses($_SESSION['searchWord']));
		}else{
			$this->view('Student/searchClasses');
		}
	}

	function backSearchResults(){
		$classes = new \App\models\Classes();

		$this->view('Student/searchResults', $classes->searchClasses($_SESSION['searchWord']));
	}

	function editInformation(){
		if(isset($_POST["action"])){
			$student = new \App\models\Student();
			$student-> first_name = $_POST["first_name"];
			$student-> last_name = $_POST["last_name"];
			$student-> student_id = $_SESSION['student_id'];
			$student-> update();

			$_SESSION['first_name'] = $student->first_name;
			$_SESSION['last_name'] = $student->last_name;
			header("location:".BASE."/Student/index");
		}else{
			$student = new \App\models\Student();
			$student = $student->find($_SESSION['student_id']);
			$this->view('Student/editStudent', $student);
		}
	}
}
?>
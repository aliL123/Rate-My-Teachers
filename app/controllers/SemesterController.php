<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class SemesterController extends \App\core\Controller{

	function index()
        {
            $semester = new \App\models\Semester();
            $semester = $semester->getAll();
            $this->view('Semester/listSemesters',$semester);
        }


		function add(){
			if(isset($_POST["action"])){
				$user = new \App\models\User();
	
				$semester = new \App\models\Semester();
				$semester-> semester_name = $_POST["semester_name"];
				$semester-> insert();
	
				header("location:".BASE."/Classes/add");
			}else{
				$this->view('Teacher/addSemester');
			}
		}

	function delete($picture_id){
		$semester = new \App\models\Semester();
		$semester = $semester->find($semester_id);

		$semester->delete();
		$this->view('Teacher/semesters');
	}

	function edit($semester_id){
		$semester = new \App\models\Semester();
		$semester = $semester->find($semester_id);
		if(isset($_POST['action'])){
			$semester->semester_name = $_POST['semester_name'];
			$semester->update();
			header('location:'.BASE.'/Teacher/semesters');
		}else{
			$this->view('Semester/edit',$semester);
		}
	}
}
?>
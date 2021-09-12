<?php
namespace App\controllers;

#[\App\core\LoginFilter]
class UserController extends \App\core\Controller{
	function index(){
        $this->view('Teacher/teacherProfilePage.php', $_SESSION['username']);
	}

	function search(){
		if(isset($_POST["action"])){
			$users = new \App\models\User();

			$this->view('Profile/searchResults', $users->search($_POST["searchWord"]));
		}else{
			$this->view('Profile/searchForm');
		}
	}
}
?>
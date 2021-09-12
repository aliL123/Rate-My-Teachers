<?php
namespace App\controllers;

class DefaultController extends \App\core\Controller{
	
	function index(){
		$this->view('Default/index');
	}

	#[\App\core\LoginFilter]
	function editPassword(){
		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user->username= $_SESSION['username'];

			if($_POST['password'] == $_POST['password_confirm']){
				$user->username = $_SESSION['username'];
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

				if($user->updatePassword()){
					header('location:'.BASE.'/Default/somewhereSecure');	
				} else {
					header('location:'.BASE.'/Default/editPassword?error=The password was not registered!');	
				}
			}else{
				header('location:'.BASE.'/Default/editPassword?error= Passwords do not match');	
			}
		}else{
			$secretkey = \App\core\TokenAuth::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;
			$this->view('Default/editPassword', $secretkey);
		}
	}

	function register(){
		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user->username= $_POST['username'];
			$user->role= $_POST['role'];

			$verification = $user->find($user->username);

			if($verification != null){
				$secretkey = \App\core\TokenAuth::generateRandomClue();
				$_SESSION['secretkey'] = $secretkey;
				$this->view('Login/Register', $secretkey);
			} else {
				if($_POST['password'] == $_POST['password_confirm']){
					$user->username = $_POST['username'];
					$user->role= $_POST['role'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

					if($user->insert()){
						header('location:'.BASE.'/Default/login');	
					} else {
						header('location:'.BASE.'/Default/register?error=The user was not registered!');	
					}
				}else{
					header('location:'.BASE.'/Default/register?error= Passwords do not match');	
				}
			}
		}else{
			$secretkey = \App\core\TokenAuth::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;
			$this->view('Login/Register', $secretkey);
		}
	}

	#[\App\core\LoginFilter]
	function twofasetup(){
		if(isset($_POST['action'])){
			//only when I verify that both pass and confir match
			$currentcode = $_POST['currentCode'];
			if(\App\core\TokenAuth::verify($_SESSION['secretkey'], $currentcode)){
				//the user has verified their proper 2-factor authentication setup
				$user = new \App\models\User();
				$user->user_id = $_SESSION['user_id'];
				$user->secret_key= $_SESSION['secretkey'];
				$user->update2fa();
				header('location:'.BASE.'/Default/login');	
			}else{
				header('location:'.BASE.'/Default/twofasetup?error=Token not verified!');	
			}
		}else{
			$secretkey = \App\core\TokenAuth::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;

			$url = \App\core\TokenAuth::getLocalBarCodeUrl($_SESSION['username'],'thedomain.com',$secretkey,'SecureApplication');

			$this->view('Login/twofasetup', $url);
		}
	}

	function makeQRCode(){
		$data = $_GET['data'];
		\QRcode::png($data);
	}

	function login(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			$user = $user->find($_POST['username']);

			if($user != null && 
				password_verify($_POST['password'], $user->password_hash)){
					//log in the user...
					//remember that user is logged in...
					//two kinds of users: with or without 2-fa
					if($user->secret_key == null){
						$_SESSION['user_id'] = $user->user_id;
						$_SESSION['username'] = $user->username;
						header('location:'.BASE.'/Default/somewhereSecure');
					} else {
						$_SESSION['temp_user_id'] = $user->user_id;
						$_SESSION['temp_username'] = $user->username;
						$_SESSION['secret_key'] = $user->secret_key;
						header('location:'.BASE.'/Default/validateLogin');
					}
			}else{
				header('location:'.BASE.'/Default/login?error=Username/password mismatch!');
			}
		}else{
			$this->view('Login/login');
		}
	}

	#[\App\core\LoginFilter]
	function validateLogin(){
		//need the secret key
		if(isset($_POST['action'])){
			$currentCode = $_POST['currentCode'];
			if(\App\core\TokenAuth::verify($_SESSION['secret_key'], $currentCode)){
				$_SESSION['user_id'] = $_SESSION['temp_user_id'];
				$_SESSION['username'] = $_SESSION['temp_username'];
				$_SESSION['secret_key'] = '';
				header('location:'.BASE.'/Default/somewhereSecure');
			} else {
				session_destroy();
				header('location:'.BASE.'/Default/login?error=Username/password mismatch!');
			}
		}else{
			$this->view('Login/validateLogin');
		}
	}

	function logout(){
		session_destroy();
		header('location:'.BASE.'/');
	}

	#[\App\core\LoginFilter]
	function somewhereSecure(){
		$user = new \App\models\User();
		$user = $user->find($_SESSION['username']);

		if($user->role == 'student'){
			$student = new \App\models\Student();
			$student = $student->find($user->user_id);
			$_SESSION['first_name'] = $student->first_name;
			$_SESSION['last_name'] = $student->last_name;

			$this->view('Student/studentSecure');
		} else {
			$teacher = new \App\models\Teacher();
			$teacher = $teacher->find($user->user_id);
			$_SESSION['first_name'] = $teacher->first_name;
			$_SESSION['last_name'] = $teacher->last_name;

			$this->view('Teacher/teacherSecure');
		}
	}
}
?>
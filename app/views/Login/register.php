<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Register an Account</title>
	</head>

	<body style="background: #AAAAAA;">
		<?php
			if(isset($_GET['error']))
			{
				echo $_GET['error'];
			}
			//var_dump($data);
		?>

		<div class="container" id="tableDiv" style="text-align: center;">
				</br><h1 style="text-align: center;">Create an Account</h1></br>

				<form method="post" action="">
						<div class="form-group">
								<input type="text" class="form-control" id="usernameInput" name="username" placeholder="Enter Username">
						</div>

						<div class="form-group">
								<input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
						</div>

						<div class="form-group">
								<input type="password" class="form-control" id="passwordConfirmInput" name="password_confirm" placeholder="Password Confirm">
						</div>

						<div class="form-group">
							<label for="receiver">Role</label><br />
							<select class="form-control" aria-label="Default select example" name="role">
								<option value='student'>Student</option>
								<option value='teacher'>Teacher</option>
							</select>
						</div>

						<input type="submit" name="action" value="Sign Up" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
				</form>

				</br></br><p>Already have an account? <a href="<?=BASE?>/Default/login">Log In.</a></p>
		</div>
	</body>
</html>
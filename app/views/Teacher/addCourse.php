<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
						integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">

		<title>Add a class</title>
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
			</br><h1><?=$_SESSION['last_name']?>, <?=$_SESSION['first_name']?> add your Course</h1></br>

			<form method="post" action="">
					<div class="form-group">
						<label for="course_id">Course Name</label><br />
                        <input type="text" class="form-control" id="course_name" name="course_name">
					</div>

					<input type="submit" name="action" value="Add Course" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
			</form>

			
			</br></br><p><a class="nav-link" href="<?=BASE?>/Classes/add/">Cancel</a></a></p>
		</div>
	</body>
</html>
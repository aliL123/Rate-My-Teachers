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
			</br><h1><?=$_SESSION['last_name']?>, <?=$_SESSION['first_name']?> add your class</h1></br>

			<form method="post" action="">
					<div class="form-group">
						<label for="course_id">Select Course</label><br />
						<select class="form-control" aria-label="Default select example" name="course_id">
							<?php
                                $courses = new \App\models\Course();
                                $courses = $courses->findAll();

								foreach ($courses as $course) {
									echo "<option value='$course->course_id'>$course->course_name</option>";
								}
							?>
						</select>
						</br><button type='button' class='btn btn-secondary btn-lg btn-block'>
							<a href="<?=BASE?>/Course/add" style='color: white;'>Add a new Course</a>
						</button></br>
					</div>

					<div class="form-group">
						<label for="semester_id">Select Semester</label><br />
						<select class="form-control" aria-label="Default select example" name="semester_id">
                            <?php
                                $semesters = new \App\models\Semester();
                                $semesters = $semesters->findAll();

								foreach ($semesters as $semester) {
									echo "<option value='$semester->semester_id'>$semester->semester_name</option>";
								}
							?>
						</select>
						</br><button type='button' class='btn btn-secondary btn-lg btn-block'>
							<a href="<?=BASE?>/Semester/add" style='color: white;'>Add a new Semester</a>
						</button></br>
					</div>

					<input type="submit" name="action" value="Add Class" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
			</form>

			
			</br></br><p><a class="nav-link" href="<?=BASE?>/Teacher/courses/">Cancel</a></a></p>
		</div>
	</body>
</html>
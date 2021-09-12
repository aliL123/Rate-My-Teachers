<!doctype html>

<html lang="en" style="background: #AAAAAA;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title>Your Pictures</title>
    </head>

    <body style="background: #AAAAAA;">
        <div class="container" id="tableDiv" style="text-align: center;">
            <h1 style="text-align: center;">Your Classes</h1>
        
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE?>/Teacher/teacherProfilePage/">Profile Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?=BASE?>/Teacher/courses">Your Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE?>/Default/somewhereSecure">User Page</a>
                </li>
            </ul></br>	

            <?php
                foreach($data as $class){
                    $teacher = new \App\models\Teacher();
                    $teacher = $teacher->findTeacher($class->teacher_id);

                    $semester = new \App\models\Semester();
                    $semester = $semester->find($class->semester_id);

                    $course = new \App\models\Course();
                    $course = $course->find($class->course_id);


                    echo "<div class='card text-center'>
                            <div class='card-header'>
                                <p>$course->course_name</p>
                            </div>
            
                            <div class='card-body' style='display: inline;'>
                                <p>$teacher->first_name, $teacher->last_name</p>
                                <p>$semester->semester_name</p>
                            </div>

                            <div class='card-footer text-muted' style='width: auto;'>
                                <a href='".BASE."/Review/seeReviewTeacher/$class->class_id'>See the Reviews</a></br>
                                <a href='".BASE."/Review/leaveReviewTeacher/$class->class_id'>Leave a Review</a></br>
                                <a href='".BASE."/Classes/delete/$class->class_id'>Delete</a>
                            </div>
                        </div></br></br>";
                }
            ?>

            </br><button type='button' class='btn btn-secondary btn-lg btn-block'>
                <a href="<?=BASE?>/Classes/add" style='color: white;'>Add a new class</a>
            </button></br>
        </div>
	</body>
</html>
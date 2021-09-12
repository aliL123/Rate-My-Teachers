<!doctype html>

<html lang="en" style="background: #AAAAAA;">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="css/style.css">

                <title>Review for the class</title>
        </head>

        <body style="background: #AAAAAA;">
            <div class="container" id="tableDiv" style="text-align: center;">

                <h1 style="text-align: center;">Here are the reviews that were left for this class <?=$_SESSION['username']?></h1>

                <?php
                    foreach($data as $review){
                        $user = new \App\models\User();
                        $user = $user->findUser($review->user_id);

                        if($user->role == "student"){
                            $person = new \App\models\Student();
                            $person = $person->find($user->user_id);
                        } else {
                            $person = new \App\models\Teacher();
                            $person = $person->find($user->user_id);
                        }
                        

                        echo "<div class='card text-center'>
                            <div class='card-header'>
                                <p>Review done by $person->first_name, $person->last_name</p>
                            </div>
            
                            <div class='card-body' style='display: inline;'>
                                <p>$review->content</p>
                            </div>

                            <div class='card-footer text-muted' style='width: auto;'>
                                <p>Rating given for that class is $review->rating</p>";

                            if($review->user_id == $_SESSION["user_id"]){
                                echo "
                                <a href='".BASE."/Review/modifyReviewTeacher/$review->class_id/$review->review_id'>Modify your Review</a></br>
                                ";
                            }
                            
                        echo "<a href='".BASE."/Review/deleteReviewTeacher/$review->class_id/$review->review_id'>Delete Review</a></br>
                            </div></div></br></br>";
                    }
                ?>

                </br><button type="button" class="btn btn-secondary btn-lg btn-block">
                    <a href='<?=BASE?>/Review/leaveReviewTeacher/<?=$_SESSION["class_id"]?>' style="color: white;">Leave a Review</a></br>
                </button>
                </br></br><p><a class="nav-link" href="<?=BASE?>/Teacher/courses/">Cancel</a></p>
            </div>
	</body>
</html>
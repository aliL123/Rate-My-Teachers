<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Update Review</title>
	</head>

	<body style="background: #AAAAAA;">

		<div class="container" id="tableDiv" style="text-align: center;">
				</br><h1><?=$_SESSION['last_name']?>, <?=$_SESSION['first_name']?> update your review</h1></br>

				<form method="post" action="">
                    </br><div class="form-group">
                        <label>Content</label><br />
                        <input type="text" class="form-control" id="passwordInput" name="content" value="<?=$data->content?>">
                    </div>

                    <input type="submit" name="action" value="Submit Changes" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
				</form>

                
				</br></br><p><a class="nav-link" href="<?=BASE?>/Review/seeReviewTeacher/<?=$data->class_id?>">Cancel</a></p>
		</div>
	</body>
</html>
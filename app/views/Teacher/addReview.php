<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Add Review</title>
	</head>

	<body style="background: #AAAAAA;">

		<div class="container" id="tableDiv" style="text-align: center;">
				</br><h1><?=$_SESSION['last_name']?>, <?=$_SESSION['first_name']?> add your review</h1></br>

				<form method="post" action="">
                    </br><div class="form-group">
                        <label>Content</label><br />
                        <input type="text" class="form-control" id="passwordInput" name="content">

                        <label for="rating">Select your rating</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                        </select>
                    </div>

                    <input type="submit" name="action" value="Submit Changes" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
				</form>

                
				</br></br><p><a class="nav-link" href="<?=BASE?>/Teacher/courses/">Cancel</a></p>
		</div>
	</body>
</html>
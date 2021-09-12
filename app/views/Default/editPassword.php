<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Update a Password</title>
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
				<form method="post" action="">
                    <div class="form-group">
                        <label><h1>Change your password <?=$_SESSION['username'] ?></h1></label><br/></br>
                    </div>

                    <div class="form-group">
                            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                            <input type="password" class="form-control" id="passwordConfirmInput" name="password_confirm" placeholder="Password Confirm">
                    </div>

                    <input type="submit" name="action" value="Submit Changes" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
            
                    </br></br><a href="<?=BASE?>/Default/somewhereSecure">Cancel</a>
                </form>
		</div>
	</body>
</html>
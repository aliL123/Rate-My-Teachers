<!doctype html>

<html lang="en" style="background: #AAAAAA;">
        <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Log In Page</title>
        </head>

        <body style="background: #AAAAAA;">
			<div class="container" id="tableDiv" style="text-align: center;">
				</br><h1 style="text-align: center;">Authentication</h1></br>
				<p>Enter the 6-digit code from your authenticator application for this domain.</p>

				<form method="post" action="">
					<div class="form-group">
						<input type="password" class="form-control" id="currentCodeInput" name="currentCode" placeholder="Enter Current Code">
					</div>

					<input type="submit" name="action" value="Verify Code" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
			
					</br></br><a href="<?=BASE?>/Default/login">Cancel</a>
				</form>
			</div>
	</body>
</html>
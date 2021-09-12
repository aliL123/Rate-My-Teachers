<!doctype html>

<html lang="en" style="background: #AAAAAA;">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
							integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="css/style.css">

			<title>Update a 2fa</title>
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
			<h1>Set Up Two Factor Authentication</h1></br></br>

			<img src="<?= BASE ?>/Default/makeQRCode?data=<?= $data ?>"/></br><br/>
			<p>Please scan the QR-code on the screen with your favorite Authenticator software, such as Google Authenticator. 
				</br>The authenticator software will generate codes that are valid for 30 seconds only. 
				</br>Enter such a code while and submit it while it is still valid to confirm that the 2-factor authentication can be applied to your account.
			</p>

			<form method="post" action="">
				<div class="form-group">
					<input type="password" class="form-control" id="currentCodeInput" name="currentCode" placeholder="Enter Current Code">
				</div>

				<input type="submit" name="action" value="Verify Code" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
		
				</br></br><a href="<?=BASE?>/Default/somewhereSecure">Cancel</a>
			</form>
		</div>
	</body>
</html>
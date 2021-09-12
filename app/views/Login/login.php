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
                        </br><h1 style="text-align: center;">Log In Your Account</h1></br>

                        <form method="post" action="">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Enter Username">
                                </div>

                                <div class="form-group">
                                        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
                                </div>

                                <input type="submit" name="action" value="Log In" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
                        </form>

                        </br></br><p>Dont have an account? <a href="<?=BASE?>/Default/register">Sign Up</a></p>
                </div>
	</body>
</html>
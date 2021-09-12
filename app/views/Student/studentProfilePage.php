<!doctype html>

<html lang="en" style="background: #AAAAAA;">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">

            <title>Profile Page</title>
    </head>

    <body style="background: #AAAAAA;">
        <div class="container" id="tableDiv" style="text-align: center;">

            <h1 style="text-align: center;">Welcome back to your Student profile page <?=$_SESSION['username']?></h1>

            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=BASE?>/Student/studentProfilePage/">Profile Page</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=BASE?>/Student/searchClasses/">Search Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE?>/Default/somewhereSecure">User Page</a>
                </li>
            </ul></br>	

            </br><h2>Profile Information</h2>
            <h3>First Name - <?=$_SESSION['first_name']?></h3>
            <h3>Last Name - <?=$_SESSION['last_name']?></h3>

            </br><button type='button' class='btn btn-secondary btn-lg btn-block'>
                <a href="<?=BASE?>/Student/editInformation" style='color: white;'>Modify Profile Information</a>
            </button></br>
        </div>
	</body>
</html>
<!doctype html>

<html lang="en" style="background: #AAAAAA;">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="css/style.css">

                <title>Search Page</title>
        </head>

        <body style="background: #AAAAAA;">
            <div class="container" id="tableDiv" style="text-align: center;">

                <h1 style="text-align: center;">Make a search <?=$_SESSION['username']?></h1>

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE?>/Student/profilePage/">Profile Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=BASE?>/Student/searchClasses/">Search Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE?>/Default/somewhereSecure">User Page</a>
                    </li>
                </ul></br></br>

                </br></br><h3>Enter the name of the course you are looking for.</h3></br>


                <form method="post" action="">

                    <div class="form-group">
                            <input type="text" class="form-control" id="passwordInput" name="searchWord" placeholder="Search Word">
                    </div>

                    </br><input type="submit" name="action" value="Search" class="form-control" style="width: 30%; margin: auto; background: #7193FF; color: #FFFFFF;"/>
            
                    </br></br><p><a class="nav-link" href="<?=BASE?>/Student/profilePage/">Cancel</a></p>
                </form>
            </div>
	</body>
</html>
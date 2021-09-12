<!doctype html>

<html lang="en" style="background: #AAAAAA;">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="css/style.css">

                <title>User Page</title>
        </head>

        <body style="background: #AAAAAA;">
            <div class="container" id="tableDiv" style="text-align: center;">
                <?php
                    $user = new \App\models\User();
                    $user = $user->find($_SESSION['username']);

                    $student = new \App\models\Student();
                    $student = $student->find($user->user_id);

                    if($student == false){
                        header('location:'.BASE.'/Student/add');
                    }
                ?>

                <h1>Welcome to your Student account <?= $_SESSION['username']?></h1></br>

                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE?>/Student/profilePage/">Profile Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=BASE?>/Student/searchClasses/">Search Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=BASE?>/Default/somewhereSecure">User Page</a>
                    </li>
                </ul></br></br>

                <?php
                    $user = new \App\models\User();
                    $user = $user->find($_SESSION['username']);

                    if($user->secret_key == null){
                        echo "<button type='button' class='btn btn-secondary btn-lg btn-block'>
                                    <a href='".BASE."/Login/twofasetup/' style='color: white;'>Setup two factor authentication</a>
                                </button></br>";
                    }
                ?>

                <button type='button' class='btn btn-secondary btn-lg btn-block'>
                    <a href = '<?= BASE ?>/Default/editPassword/' style='color: white;'>Change Password</a>
                </button></br>

                <br/></p><a href = '<?= BASE ?>/Default/logout'>Logout</a></p>
            </div>
	</body>
</html>

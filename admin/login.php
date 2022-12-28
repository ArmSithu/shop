
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3 badge bg-light text-dark">
                <h3>Login</h3>
                <form action="login_check.php" method="POST">
                    <input type="text" name="username" class="form-control" maxlength="10" required placeholder="Username"><br>
                    <input type="password" name="password" class="form-control" maxlength="10" required placeholder="Password"><br>
                    <?php
                    if(isset($_SESSION["Error"])){
                        echo "<div class='text-danger'>";
                        echo $_SESSION["Error"] ;
                    }
                    $_SESSION["Error"]="";
                    ?>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <br>
        <!--<a href="register.php">Register</a>-->
    </div>
</body>

</html>
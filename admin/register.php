<?php
include 'condb.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <?php
    include 'menu1.php';
    ?>
    <div class="container">

        <br>
        <div class="row">
            <div class="col-md-6 text-bg-light">
                <form action="insert_register.php" method="POST" enctype="multipart/form-data">

                    <div class="alert alert-info h4 text-center" role="alert">
                        สมัครสมาชิก
                    </div>

                    ชื่อ <input type="text" name="firstname" class="form-control" required placeholder="ชื่อ">
                    นามสกุล <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล">
                    phone <input type="number" name="phone" class="form-control" required placeholder="phone" maxlength="10">
                    Username <input type="text" name="username" class="form-control" required placeholder="Username" maxlength="10">
                    Password <input type="password" name="password" class="form-control" required placeholder="Password" maxlength="10"><br>
                    <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                    <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger"><br>
                    <br>
                    <a href="login.php">Login</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
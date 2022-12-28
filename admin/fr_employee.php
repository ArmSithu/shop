<?php
session_start();

if (!isset($_SESSION["emp_userid"])) {
    header("location:login.php");
}
?>
<?php
include 'condb.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    include 'menu1.php';
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4 mt-4">
                    <div class="card-header">

                        <div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="insert_register.php" method="POST" enctype="multipart/form-data">
                                        <br>
                                        <div class="alert alert-info h4" role="alert">
                                            เพิ่มข้อมูลพนักงาน
                                        </div>
                                        ชื่อ <input type="text" name="firstname" class="form-control" required placeholder="ชื่อ">
                                        นามสกุล <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล">
                                        phone <input type="number" name="phone" class="form-control" required placeholder="phone" maxlength="10">
                                        Username <input type="text" name="username" class="form-control" required placeholder="Username" maxlength="10">
                                        Password <input type="password" name="password" class="form-control" required placeholder="Password" maxlength="10"><br>
                                        <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
                                        <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-danger"><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include 'footer.php';
        ?>
    </div>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>


<script>
    function del(mypage) {
        var agree = confirm('ต้องการที่จะลบข้อมูลหรือไม่');
        if (agree) {
            window.location = mypage;
        }
    }

    function del1(mypage) {
        var agree = confirm('คุณต้องการปรับสถานะว่าชำระเงินแล้วหรือไม่');
        if (agree) {
            window.location = mypage1;
        }
    }
</script>
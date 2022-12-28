<?php
session_start();

if (!isset($_SESSION["emp_userid"]))
{
    header("location:login.php");

}
?>
<?php
include 'condb.php';
$ids = $_GET['id'];

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
                        <i class="fas fa-table me-1"></i>
                        แสดงรายการสินค้าที่ลูกค้าสั่ง

                        <div>
                            <br>
                            <a href="report_order.php"><button type="button" class="btn btn-outline-success">Back</button></a>
                        </div>
                        <br>
                        <div>


                        </div>

                        <div class="card-body">
                            <h5>หมายเลขสั่งซื้อ :<?= $ids ?></h5>
                            <table  class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>รหัสสินค้า</th>
                                        <th>ชื้อสินค้า</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>ราคารวม</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    $sql = "select * from  order_detail d, product p,tb_order t  where  d.orderID=t.orderID
                                     and d.pro_id=p.pro_id and d.orderID='$ids' order by d.pro_id ";
                                    $result = mysqli_query($conn, $sql);
                                    $sum_total=0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sum_total=$row['total_price'];
                                    ?>
                                        <tr>
                                            <td><?= $row['pro_id'] ?></td>
                                            <td><?= $row['pro_name'] ?></td>
                                            <td><?= number_format($row['orderPrice'],2) ?></td>
                                            <td><?= $row['orderQty'] ?></td>
                                            <td><?= number_format($row['Total'], 2) ?></td>

                                        </tr>
                                    <?php
                                    }
                                    //mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                            <b>ยอดรวมสุทธิ <?= number_format($sum_total,2)?></b>
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
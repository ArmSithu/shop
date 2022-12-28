<?php
session_start();
include 'condb.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="bootstrap/img.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <div class="contaner">
        <form id="form1" method="POST" action="insert_cart.php">
            <div class="row">
                <div class="col-md-10">
                    <div class="alert alert-success h4 " role="alert">
                        การสั่งซื่อสินค้า
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>ลำดับที่</th>
                            <th>ชื่อสิ้นค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>เพิ่ม - ลด</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $Total = 0;
                        $sumPrice = 0;
                        $m = 1;
                        for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                            if (($_SESSION["strProductID"][$i]) != "") {
                                $sql1 = "select * from product where pro_id =' " .  $_SESSION["strProductID"][$i] . " ' ";
                                $result1 = mysqli_query($conn, $sql1);
                                $row_pro = mysqli_fetch_array($result1);


                                $_SESSION["price"] = number_format($row_pro['price'], 2);
                                $Total = $_SESSION["strQty"][$i];
                                $sum = $Total * $row_pro['price'];
                                $sumPrice = $sumPrice + $sum;
                                $_SESSION["sum_Price"] = $sumPrice;

                                // $sumPrice = number_format($sumPrice);

                        ?>
                                <tr>
                                    <td><?= $m ?></td>
                                    <td>
                                        <img src="image/<?= $row_pro['image'] ?>" width="80px" height="90px" class="border">
                                        <?= $row_pro['pro_name'] ?>
                                    </td>
                                    <td><?= number_format($row_pro['price'], 2) ?></td>
                                    <td><?= $_SESSION["strQty"][$i] ?></td>
                                    <td><?= $sum ?></td>
                                    <td>
                                        <a href="order.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-outline-success">+</a>
                                        <?php
                                        if ($_SESSION["strQty"][$i] > 1) {

                                        ?>
                                            <a href="order_del.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-outline-danger">-</a>
                                        <?php    } ?>

                                    </td>
                                    <td><a href="pro_delete.php?Line=<?= $i ?>"> <img src="image/icons8-trash-64.png" width="30px"> </a></td>
                                </tr>


                        <?php
                                $m = $m + 1;
                            }
                        }
                        ?>
                        <tr>
                            <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                            <td class="text-center"><?= number_format($sumPrice, 2) ?></td>
                            <td>THB</td>
                        </tr>


                    </table>
                    <div style="text-align:right">
                        <a href="show_product.php" class="btn btn-outline-secondary">เลือกสินค้าต่อ</a>
                        <button type="submit" href="#" class="btn btn-outline-success">ยืนยันการสั่งซื่อ</button>
                    </div><br>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-success h4 " role="alert">
                            ข้อมูลสำหรับจัดส่งสินค้า
                        </div><br>
                        ชื่อ-นามสกุล :
                        <input type="text" name="cus_name" class="form-control mt-2" required placeholder="ชื่อ-นามสกุล"><br>
                        เบอร์ติดต่อ :
                        <input type="number" name="cus_tel" class="form-control mt-2" required placeholder="เบอร์ติดต่อ :"><br>
                        ที่อยู่จัดส่ง :
                        <textarea name="cus_add" id="" rows="5" class="form-control mt-2" required placeholder="ที่อยู่จัดส่ง  :"></textarea>
                    </div>

                </div>
            </div>
        </form>

    </div>
</body>

</html>
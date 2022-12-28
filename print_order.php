<?php
session_start();
include 'condb.php';
$sql="select * from tb_order where orderID='".$_SESSION["order_id"]."'";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="bootstrap/img.css">
</head>

<body>
<?php
    include 'menu.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-success h4 mt-4" role="alert">
                    การสั่งซื่อสินค้าเสร็จสมบูรณ์
                </div>
                เลขที่การสั่งซื้อสั่งซื้อ :<?=$rs['orderID']?> <br>
                ชื้อ-นามสกุล (ลูกค้า) :<?=$rs['cus_name']?> <br>
                ที่อยู่การจัดส่ง :<?=$rs['address']?> <br>
                เบอร์โทรศัพท์ :<?=$rs['telephone']?> <br>
                <br>
                <div class="card mb-4 mt-4">
<div class="card-body">
                <table class="table table-hover-">
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
                      $sql1="select * from order_detail d,product p where d.pro_id=p.pro_id and d.orderID='".$_SESSION["order_id"]."'";
                      $result1=mysqli_query($conn,$sql1);
                      while($row=mysqli_fetch_array($result1)){
                        ?>
                        <tr>
                            <td><?=$row['pro_id']?></td>
                            <td><?=$row['pro_name']?></td>
                            <td><?=number_format($row['orderPrice'])?></td>
                            <td><?=$row['orderQty']?></td>
                            <td><?=number_format($row['Total'])?></td>
                        </tr>
                        
                    </tbody>
                    <?php
                      }
                    ?>
                </table>
                
                <h6 class="text-end">รวมเป็นเงิน <?=number_format($total_price,2)?>บาท</h6>
                </div>
                </div>
                <div>
                Tip: A great benefit of PDO is that it has an exception class to handle any problems that may occur in our database queries. If an exception is thrown within the try{ } block, the script stops
                <br>
                </div>
                <br>
                <div class="text-center">
                <a href="show_product.php" class="btn btn-success">Back</a>
                <button onclick="window.print()" class="btn btn-info">Print</button>
            </div>
            </div>

        </div>
    </div>
</body>

</html>
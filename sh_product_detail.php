<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
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
            <?php
            $ids = $_GET['id'];
            $sql = "SELECT * FROM product, type WHERE product.type_id= type.type_id and product.pro_id='$ids' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);


            ?>
            <div class="col-md-4">
                <img src="image/<?= $row['image'] ?>" width="350px" class="mt-2 p-2 my-2 border">

            </div>
            <div class="col-md-6">
                ID:<?= $row['pro_id'] ?><br>
                <h5 class="text-dark"> <?= $row['pro_name'] ?></h5>
                Name Product:<?= $row['type_name'] ?><br>
                Product:<?= $row['detail'] ?><br>
                Price <b class="text-danger"><?= number_format($row['price'],2) ?> </b> THB<br>
                <a href="order.php?id=<?= $row['pro_id'] ?>" class="btn btn-outline-success mt-2">Add to Cart</a>

            </div>

        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>
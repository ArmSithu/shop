<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/img.css">
    <script src="bootstrap/js/bootstrap.min.js" ></script>
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <div class="containe">
        <br><br>
        <div class="row">
            <?php
            $sql = "SELECT * FROM product ORDER BY pro_id ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {


            ?>

                <div class="col">
                    <div class="text-center">

                        <img src="image/<?= $row['image'] ?>" width="200px" height="250" class="mt-2 p-2 my-2 border"><br>
                        ID:<?= $row['pro_id'] ?><br>
                        <h5 class="text-dark"> <?= $row['pro_name'] ?></h5>
                        Price <b class="text-danger"><?= number_format($row['price'], 2) ?> </b> THB<br>
                        <a href="sh_product_detail.php?id=<?= $row['pro_id'] ?>" class="btn btn-outline-success mt-2">รายละเอียด</a>

                    </div>
                    <br>
                </div>
            <?php
            }
            mysqli_close($conn);
            ?>

        </div>
    </div>
</body>

</html>
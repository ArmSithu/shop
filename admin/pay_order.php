<?php
session_start();

if (!isset($_SESSION["emp_userid"]))
{
    header("location:login.php");

}
?>
<?php
include 'condb.php';
$ids=$_GET['id'];

$sql="UPDATE tb_order SET order_status = 2 WHERE orderID='$ids' ";
$result=mysqli_query($conn,$sql);
if ($result) {
    //echo "<script> alert('ยกเลิกใบสั่งซื้อเรียบร้อย'); </script>";
    echo "<script> window.location='report_order.php'; </script>";
    
}else {
    echo "<script> alert('ไม่สามารถปรับได้'); </script>";

}
mysqli_close($conn);

?>
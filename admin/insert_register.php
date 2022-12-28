<?php
include 'condb.php';


$name=$_POST['firstname'];
$lastname=$_POST['lastname'];
$tel=$_POST['phone'];
$username=$_POST['username'];
$password=$_POST['password'];
//login
$password=hash('sha512',$password);

$sql="INSERT INTO member1 values('','$name','$lastname','$tel','$username','$password')";
$result=mysqli_query($conn,$sql);
if ($result) {
echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo "<script> window.location='fr_employee.php';</script>";
}else {
    echo "Error" ."$sql". "<br>". mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้');</script>";

}
mysqli_close($conn);

?>

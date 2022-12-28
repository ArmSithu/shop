<?php
session_start();

if (!isset($_SESSION["emp_userid"]))
{
    header("location:login.php");

}
?>
<?php
include 'condb.php';
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

//login
$password=hash('sha512',$password);

$sql="SELECT * FROM member WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if ($row > 0) {
$_SESSION["emp_username"]=$row['username'];
$_SESSION["emp_password"]=$row['password'];
$_SESSION["emp_userid"]=$row['id'];
$_SESSION["emp_name"]=$row['name'];
$_SESSION["emp_lastname"]=$row['lastname'];
$_SESSION["Error"]="";
$show=header("location:index.php");
$_SESSION["Error"]="";

}else{
    $_SESSION["Error"] = "<p> your username or password is invalid </p>";
    $show=header("location:login.php"); 
}
echo $show;
?>



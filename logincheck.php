<!DOCType html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<?php
session_start( );
$conn = mysqli_connect("192.168.0.5","root","9498","webphp");
mysqli_select_db($conn,"webphp");

$id = $_POST['name'];
$pw = $_POST['pw'];

$query = "select name,pw from phptable where name='".$_POST['name']."' and pw='" .$_POST['pw']."'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

//아이디, 비밀번호가 일치한다면
if($row==0){
   echo "<script>alert('ID 또는 비밀번호를 확인해주세요');</script>";
   echo("<script>location.href='login.php';</script>");
}

//아이디, 비밀번호가 일치하지 않는다면
else{
  echo "success";
  $_SESSION['login_id'] = $_POST['name'];
  echo("<script>location.href='home.php';</script>");
}
?>
</body>
</html>

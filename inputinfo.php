
<!DOCType html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<?php
$conn = mysqli_connect("192.168.0.5","root","9498","webphp");
mysqli_select_db($conn,"webphp");

$name=$_POST['name'];
$email=$_POST['pw'];
$web=$_POST['website'];
$gender=$_POST['gender'];

if(strlen($name)>0 && strlen($email)>0){
$sql="insert into phptable (name,pw,web,gender) values ('".$_POST['name']."','".$_POST['pw']."','".$_POST['website']."','".$_POST['gender']."')";
$start=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row=mysqli_num_rows($target);

if($row==0){
echo "Success";
echo("<script>location.href='home.php';</script>");
}
else {
echo "Fail";
echo("<script>location.href='signin.php';</script>");
}
}
else{

  echo "<script>ㅇ</script>";
}
?>

</body>
</html>

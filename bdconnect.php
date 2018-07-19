<?php
$conn = mysqli_connect("192.168.0.5","root","9498","webphp") or die("fail");
if(!$conn){
  echo "fail";
}
else{
  echo "success";
}
?>

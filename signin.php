<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JOIN</title>
<style>
  header {
    background-color: #d5d5d5;
    height: 50px;
  }
  nav {
    background-color: #d5d5d5;
    color: white;
    width: 200px;
    height: 600px;
    float: left;
  }
  section {
    width: 800px;

    height: 600px;
    float: left;
  }
  footer {
    height: 50px;
    clear: both;
  }
  header,
  nav,
  footer {
    text-align: center;
  }
  footer {
    line-height: 100px;
  }
</style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "* ID는 필수 입력 사항입니다";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["pw"])) {
    $emailErr = "* PW는 필수 입력 사항입니다";
  } else {
    $email = test_input($_POST["pw"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
     $websiteErr = "올바른 사이트 주소를 입력하세요";
   }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "둘 중 하나를 입력하세요";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if(!empty($_POST["name"])&&!empty($_POST["pw"])){
    $conn = mysqli_connect("192.168.0.5","root","9498","webphp");
    mysqli_select_db($conn,"webphp");
    $query="select name from phptable where name='".$_POST['name']."'";
    $search=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $result=mysqli_num_rows($search);
    if($result==1){
      echo '<script language="javascript">';
      echo 'alert("중복된 ID가 있습니다 \n 다른 ID를 입력해주세요")';
      echo '</script>';
    }
    else{
    $sql="insert into phptable (name,pw,web,gender) values ('".$_POST['name']."','".$_POST['pw']."','".$_POST['website']."','".$_POST['gender']."')";
    $start=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row=mysqli_num_rows($target);
    if($row==0){
      $_SESSION['login_id'] = $name;
      echo '<script language="javascript">';
      echo 'alert("회원가입을 축하합니다")';
      echo '</script>';
      echo("<script>location.href='login.php';</script>");
    }
    else {
      echo "Fail";
      echo("<script>location.href='signin.php';</script>");
    }
  }
  }
}
?>

<script>
  function goPage() {
    location.href = "signin.php";
  }
</script>
<script>
  function goLogin() {
    location.href = "login.php";
  }
</script>

<header>
   <input type="button" value="회원가입" name="join" id="join" style="position: relative; left:670px; right:80px;
     background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;" onclick="goPage()" ;>
   <input type="button" value="로그인" name="login" id="login" style="position: relative; left:670px; right:110px;
     background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;" onclick="goLogin()" ;>
 </header>

 <nav id="nav">
   <ul>
     <li><a href="home.php" style="color:white; text-decoration:none;">HOME</a></li>
     <br>
     <li>JOIN</li>
     <br>
     <li><a href="login.php" style="color:white; text-decoration:none;">LOGIN</a></li>
     <br>
     <li>INFO</li>
     <br>
   </ul>
 </nav>
 <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
   <script>

     function getaddr() {
       new daum.Postcode({
         oncomplete: function(data) {

           var fullAddr = '';
           var extraAddr = '';

           if (data.userSelectedType === 'R') {
             fullAddr = data.roadAddress;

           }
             fullAddr = data.jibunAddress;
           }

           if (data.userSelectedType === 'R') {

             if (data.bname !== '') {
               extraAddr += data.bname;
             }

             if (data.buildingName !== '') {
               extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
             }

             fullAddr += (extraAddr !== '' ? ' (' + extraAddr + ')' : '');
           }

 

         }
       }).open();
     }
   </script>
<section style="position:relative; left:550px; right:1000px; padding-top:200px;">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <span style="color:#FF0000">* </span>아이디: <input type="text" name="name">
    <span style="color:#FF0000"><?php echo $nameErr;?> </span>
    <br><br>
    <span style="color:#FF0000">* </span>비밀번호: <input type="password" name="pw">
    <span style="color:#FF0000"><?php echo $emailErr;?> </span>
    <br><br>

    주소: <input type="text" name="postcode" style="width:70px;" placeholder="우편번호">
    <input type="button" name="addbtn" value="주소검색" onclick="getaddr()">
    <br><br>
    <input type="text" name="add1">
    <br><br>
    <!--Website: <input type="text" name="website">
      <span style="color:#FF0000"><? echo $websiteErr;?></span>
    <br><br>-->

    Gender:
    <input type="radio" name="gender" value="female" name="gender">Female
    <input type="radio" name="gender" value="male">Male
    <br><br>
  <input type="submit" name="submit" value="Submit">

  </form>

</section>
</body>
<footer style="position:relative;left:200px;right:2400px">

<p style="font-family: 'NanumSquare';">Copyright(c)2018 by H. All pictures cannot be copied without permission</footer>?>
</footer>
</html>

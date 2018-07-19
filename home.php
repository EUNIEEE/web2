<!DOCType html>
<html>
<?php
 session_start( );

 if(isset( $_SESSION['login_id'])== true )
 {
  $logtxt="로그아웃";
  $sidetxt="LOGOUT";
  $username=$_SESSION['login_id'];
 }
 else
 {
  $logtxt="로그인";
  $sidetxt="LOGIN";
  $username="";
 }
?>
<head>
  <meta charset="utf-8">
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
      width: 200px;
      text-align: center;
      float: left;
    }
    footer {
      height: 50px;
      clear: both;
    }
    header,
    nav,
    section,
    footer {
      text-align: center;
    }
    footer {
      line-height: 100px;
    }
  </style>
</head>
<title>메인</title>
<body>

  <script>
    function goPage() {
      location.href = "signin.php";
    }
  </script>

  <script>
  function goLogin() {
  if(<?php $sidetxt?>=="LOGOUT"){
      session_start() ;
      session_destroy();
      location.href="login.php";
    }
    else{
      location.href="login.php";
    }
  }
  </script>

  <header>
  <form action="logout.php" method="post">

    <!--<p style="position:relative;left:540px;right:68px; "><?php echo $username;?>님</p>-->

    <input type="button" value="회원가입" name="join" id="join" style="position: relative; left:670px; right:80px;
      background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;" onclick="goPage()";>
    <input type="submit" value="<?php echo $logtxt; ?>" name="login" id="login" style="position: relative; left:670px; right:110px;
      background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;";>
    </form>
  </header>
  <nav id="nav">
    <ul>
      <li>HOME</li>
      <br>
      <li><a href="signin.php" style="color:white; text-decoration:none;">JOIN</a></li>
      <br>
      <li><a href="login.php" style="color:white; text-decoration:none;"><?php echo $sidetxt; ?></a></li>
      <br>
      <li>INFO</li>
      <br>
    </ul>
  </nav>
  <section id="section">

    <article>


    </article>
  </section>
  <footer>
    <p style="font-family: 'NanumSquare';">Copyright(c)2018 by H. All pictures cannot be copied without permission</footer>
</body>

</html>

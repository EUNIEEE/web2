<!DOCType html>
<html>
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
    function goHome() {
      location.href = "home.php";
    }
  </script>

  <header>
    <input type="button" value="홈으로" name="login" id="login" style="position: relative; left:670px; right:80px;
      background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;" onclick="goHome()";>
    <input type="button" value="회원가입" name="join" id="join" style="position: relative; left:670px; right:110px;
      background-color:white; border-color:white; border-radius: 6px; font-family: 'NanumSquare'; font-size:15px;" onclick="goPage()";>
  </header>

  <nav id="nav">
    <ul>
      <li><a href="home.php" style="color:white; text-decoration:none;">HOME</a></li>
      <br>
      <li><a href="signin.php" style="color:white; text-decoration:none;">JOIN</a></li>
      <br>
      <li>LOGIN</li>
      <br>
      <li>INFO</li>
      <br>
    </ul>
  </nav>

  <section id="section">
    <article style="position:relative; left:580px; right:580px; padding-top:300px;">
    <form  action="logincheck.php" method="post">
      <input type="text" name="name" id="name" placeholder="아이디" class:"box"><br>
      <input type="password" name="pw" id="pw" placeholder="비밀번호" class:"box"><br>
      <br>
      <input type="submit" name="ok" id="ok" value="확인" style="font-family:'NanumSquare'; font-size:15px;" >
      <input type="button" name="cancel" id="cancel" value="취소"  style="font-family:'NanumSquare';font-size:15px;";>
    </form>
    </article>
  </section>

  <footer>
    <p style="font-family: 'NanumSquare';">Copyright(c)2018 by H. All pictures cannot be copied without permission
  </footer>

</body>

</html>

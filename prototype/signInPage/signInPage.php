<?php
session_start();
$showLoginMessage = false;
if(isset($_SESSION['isLogin'])){
  if ($_SESSION['isLogin'] == true) {
    $showLoginMessage = true;
    $currentUser = $_SESSION['currentUser'];
  }
}  else {
  $showLoginMessage = false;
  $currentUser = 'unknown';
};
$file = '../dataBase/authentication.json';
$showMessage = false;
$validedUser = false;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $userEmail = $_POST['userEmail'];
  $userPassword = $_POST['userPassword'];
  $userName = $username = strstr($userEmail, '@', true);

  if (is_null(json_decode(file_get_contents($file)))){
    $dataArray = array();
  } else {
    $dataArray = json_decode(file_get_contents($file),TRUE);
  }
  for ($i=0; $i < count($dataArray); $i++) {
    if($dataArray[$i]['userEmail'] == $userEmail && $dataArray[$i]['userPassword'] == $userPassword){
    $validedUser = true;
  }
  }

  if ($validedUser == true) {
    $_SESSION['isLogin'] = true;
    $_SESSION['currentUser'] = $userName;
    $_SESSION['userEmail'] = $userEmail;
    header('Location: ..\homePage\homePage.php');
  } else {
    $_SESSION['isLogin'] = false;
    $_SESSION['currentUser'] = 'unknown';
        $_SESSION['userEmail'] = 'unknown';
    $showMessage = true;
  }
}
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sample Contact and FahrenHeit/Celsius Form </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--set some style properties::: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../masterCss.css">
<script>
var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
</script>
<script src="../navbar.js">
</script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      Prototype
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="..\homePage\homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../forum\forum.php">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vote/vote.php">Vote</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Cart351 Project proposal.pdf">Project Proposal</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto" id="navLeft">

        <script id="nonloginTemplate" type="text/x-custom-template">
        <li class="nav-item">
          <a class="nav-link" href="..\signUpPage\signUpPage.php">Sign Up</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="..\signInPage\signInPage.php">Login</a>
        </li>
        </script>
        <script id="isLoginTemplate" type="text/x-custom-template">
        <li class="nav-item">
          <a class="nav-link" href="..\userCenter\userCenter.php" id="loginInfo"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\logout.php">Log Out</a>
        </li>
        </script>
      </ul>
    </div>
  </nav>
  <!-- signup form -->
  <div class="container signupForm" style="width:60%">
    <form name="form" action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name='userEmail' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name='userPassword' id="exampleInputPassword1" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
      <a href="..\signUpPage\signUpPage.php">Sign Up A Account?</a>

      <?php
      if ($showMessage == true) {
      echo "<p>Invalied Email Address or Password</p>";
      }
       ?>
    </form>
  </div>
</body>

</html>

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
 ?>
<!doctype html>
<html lang="en" style="height:100%">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sample Contact and FahrenHeit/Celsius Form </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
function gotoLogin(){
  window.location.href = "../signInPage/signInPage.php";
}
function gotoSignUp(){
  window.location.href = "../signUpPage/signUpPage.php";
}
</script>
<script src="../navbar.js">
</script>
<!--set some style properties::: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../masterCss.css">
</head>

<body style="height:100%; background: url('../image/images.jpg') no-repeat fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      Prototype
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
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
        <li class="nav-item">
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
  <div class="container" style="height: 100%;top: 300px;position: relative;">
      <h1 class="display-1 align-middle" style="font-size: 7rem; color: white;">Condo Management Forum Prototype</h1>
      <div class="row">
          <div class="col-6">
             <button type="button" class="btn btn-primary btn-sm btn-block" onclick="gotoLogin()">Login</button>
          </div>
          <div class="col-6">
                 <button type="button" class="btn btn-primary btn-sm btn-block" onclick="gotoSignUp()">Sign Up</button>
          </div>
      </div>

  </div>
</body>

</html>

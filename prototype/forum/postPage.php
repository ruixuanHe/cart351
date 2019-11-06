<?php
 session_start();
 date_default_timezone_set("America/New_York");
 $showLoginMessage = false;
 if(isset($_SESSION['isLogin'])){
   if ($_SESSION['isLogin'] == true) {
     $showLoginMessage = true;
     $currentUser = $_SESSION['currentUser'];
     $userEmail = $_SESSION['userEmail'];
   }
 }  else {
   $showLoginMessage = false;
   $currentUser = 'unknown';
 };

 $file = '..\dataBase\forumData.json';
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
   $topic = $_POST['Topic'];
   $content = $_POST['Content'];
   if (is_null(json_decode(file_get_contents($file)))){
     $dataArray = array();
   } else {
     $dataArray = json_decode(file_get_contents($file),TRUE);
   }
      $reply = array();
     $formArray = array(
     'userEmail' => $userEmail,
     'currentUser' => $currentUser,
     'topic' => $topic,
     'content' => $content,
     'date' => date("Y-m-d"),
     'time' => date("h:i:sa"),
     'reply' => $reply
     );

     array_push($dataArray,$formArray);
     $dataJson = json_encode($dataArray);
     file_put_contents($file, $dataJson);

     header('Location: ../forum\forum.php');
   }
 ?>
<!doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sample Contact and FahrenHeit/Celsius Form </title>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
</script>
  <script src="../navbar.js"></script>
  <script src="../forum\forum.js"></script>
  <!--set some style properties::: -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../masterCss.css">
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
  <div class="container signupForm">
    <form name="form" action="" method="post">
      <div class="form-group">
        <label for="Topic">Topic</label>
        <input type="text" class="form-control" name= "Topic"required>
      </div>
      <div class="form-group">
        <label for="Content">Content</label>
        <textarea class="form-control" id="Content" aria-label="With textarea" rows="5" name= "Content" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-md btn-block">Post</button>
    </form>
  </div>
</body>

</html>

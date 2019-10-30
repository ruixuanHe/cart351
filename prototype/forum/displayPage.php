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

$selectedId = $_GET['selectedId'];
$_SESSION['$selectedId'] = $selectedId;
 $file = '..\dataBase\forumData.json';

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
   $replyContent = $_POST['replyContent'];

   if (is_null(json_decode(file_get_contents($file)))){
     $dataArray = array();
   } else {
     $dataArray = json_decode(file_get_contents($file),TRUE);
   }
   for ($i=0; $i < count($dataArray); $i++) {
     if($dataArray[$i]['topic'] == $selectedId){
       if (is_null($dataArray[$i]['reply'])){
         $dataArray[$i]['reply'] = array();
       };

       $tempReply = array(
       'userEmail' => $userEmail,
       'currentUser' => $currentUser,
       'content' => $replyContent,
       'date' => date("Y-m-d"),
       'time' => date("h:i:sa"),
       );
       array_push($dataArray[$i]['reply'],$tempReply);
       $dataJson = json_encode($dataArray);
       file_put_contents($file, $dataJson);
   }
   }
   $url = "../forum/displayPage.php?selectedId=". $selectedId;
     header($url);
   }
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sample Contact and FahrenHeit/Celsius Form </title>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
var selectedId = <?php echo json_encode($selectedId); ?>;
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src="../navbar.js">
</script>
<script src="../forum\displayPage.js">
</script>
<!--set some style properties::: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../masterCss.css">
 <link rel="stylesheet" href="../forum\forum.css">
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
  <div class="container " id  = "mainContent">
  </div>



  <div class="container">
    <button type="button" class="btn btn-primary btn-md btn-block" onclick="reply()">Reply</button>
  </div>
  <div class="container " id="replySection">
    <form name="form" action="" method="post" id="replyForm">
      <div class="form-group">
        <label for="Content">Reply Content</label>
        <textarea class="form-control" id="replyContent" aria-label="With textarea" rows="5" name= "replyContent" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-md btn-block" >Post Reply</button>
    </form>
  </div>
</body>

</html>

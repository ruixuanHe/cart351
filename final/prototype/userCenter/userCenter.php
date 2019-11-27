<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$showSuccessInfo = false;
$adminModel = false;
session_start();
date_default_timezone_set("America/New_York");
$showLoginMessage = false;
if(isset($_SESSION['isLogin'])){
 if ($_SESSION['isLogin'] == true) {
   $showLoginMessage = true;
   $currentUser = $_SESSION['currentUser'];
   $userEmail = $_SESSION['userEmail'];
   if($currentUser == "Admin"){
     $adminModel = true;
   }
 }
}  else {
 $showLoginMessage = false;
 $currentUser = 'unknown';
};
 try {
     $file_db = new PDO('sqlite:../../db/finalProject.db');
     $file_db->setAttribute(PDO::ATTR_ERRMODE,
                             PDO::ERRMODE_EXCEPTION);
    $userCenterData = getuserCenterInfo($file_db,$userEmail);
   }
   catch(PDOException $e) {
     echo $e->getMessage();
   }
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
   $showSuccessInfo = false;
   $name = $_POST['name'];
   $condoUnit = $_POST['condoUnit'];
   if( $_FILES['imgfile']['size'] > 0)
   {
         $fileName       = $_FILES['imgfile']['name'];         // image file name
         $tmpName     = $_FILES['imgfile']['tmp_name'];       // name of the temporary stored file name
         $fileSize           = $_FILES['imgfile']['size'];   // size of the uploaded file
         $fileType         = $_FILES['imgfile']['type'];    // file type
         $fp                    = fopen($tmpName, 'r');  // open a file handle of the temporary file
         $imgContent = base64_encode(file_get_contents($tmpName));// read the temp file
         fclose($fp);
         $insertStatement =  "INSERT INTO userCenter (userEmail, name,condoUnit,fileName,tmpName,fileSize,fileType,imgContent) VALUES ('" . $userEmail . "', '" . $name . "','" . $condoUnit . "', '" . $fileName . "','" . $tmpName . "', '" . $fileSize . "', '" . $fileType . "', '" . $imgContent . "' )";
         $file_db->exec($insertStatement);
         $showSuccessInfo = true;
         header("Refresh:0");
   }
 }
 function getuserCenterInfo($file_db,$userEmail) {
 $sql_select="SELECT * FROM userCenter WHERE userEmail = '" . $userEmail . "' ORDER BY Id DESC LIMIT 1;";
 $result = $file_db->query($sql_select);
 if (!$result) die("Cannot execute query.");
  $projects = [];
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $projects[] = [
          'userEmail' => $row['userEmail'],
          'name' => $row['name'],
          'condoUnit' => $row['condoUnit'],
          'fileName' => $row['fileName'],
          'tmpName' => $row['tmpName'],
          'fileSize' => $row['fileSize'],
          'fileType' => $row['fileType'],
          'imgContent' => $row['imgContent']
        ];

  }
  return $projects;
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
<script>
var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
var userCenterData = <?php echo json_encode($userCenterData); ?>;
var adminModel = <?php echo json_encode($adminModel); ?>;
</script>
<script src="../navbar.js">
</script>
<script src="../userCenter/userCenter.js">
</script>
<link rel="stylesheet" href="../userCenter/userCenter.css">
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
        <li class="nav-item active">
          <a class="nav-link" href="../homePage/homePage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../forum/forum.php" id="ForumHref">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../vote/vote.php" id="VoteHref">Vote</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../notification/notification.php" id="NotificationHref">Notification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Cart351 Project proposal.pdf">Project Prototype Proposal</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto" id="navLeft">

        <script id="nonloginTemplate" type="text/x-custom-template">
        <li class="nav-item">
          <a class="nav-link" href="../signUpPage/signUpPage.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signInPage/signInPage.php">Login</a>
        </li>
        </script>
        <script id="isLoginTemplate" type="text/x-custom-template">
        <li class="nav-item">
          <a class="nav-link" href="../userCenter/userCenter.php" id="loginInfo"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Log Out</a>
        </li>
        </script>
      </ul>
    </div>
  </nav>
  <!-- signup form -->

  <div class="container">
  <form name="form" action="" method="post" enctype="multipart/form-data">
    <label for="exampleInputEmail1">Avatar</label>
    <div class="form-group">
      <div class="container">
          <div class="avatar-upload">
              <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url();">
                  </div>
              </div>
          </div>
      </div>
      <input type="file" class="form-control-file" name = "imgfile" id="imageUpload" accept=".png, .jpg, .jpeg">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input  class="form-control" name='name' id="name" aria-describedby="emailHelp" placeholder="Enter Age" required>
    </div>
    <div class="form-group">
      <label for="condoUnit">Condo Unit</label>
      <input  class="form-control" name='condoUnit' id="condoUnit" placeholder="Enter Condo Unit" required>
    </div>
    <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
  </form>
  <?php
  if ($showSuccessInfo == true) {
  echo "<p>User Information Saved</p>";
  }
   ?>
  </div>


</body>

</html>

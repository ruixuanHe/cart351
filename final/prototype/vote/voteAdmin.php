<?php
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
     $tableData = getVoteInfo($file_db);
   }
   catch(PDOException $e) {
     echo $e->getMessage();
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST')
   {

     $topic =  $_POST['topic'];
     $createDate = date("Y-m-d");
     $createTime = date("h:i:sa");
     $insertStatement =  "INSERT INTO vote ( userEmail, currentUser,topic,createDate,createTime) VALUES ( '" . $userEmail . "', '" . $currentUser . "', '" . $topic . "', '" . $createDate . "', '" . $createTime . "')";
     $file_db->exec($insertStatement);
     $url = "../forum/displayPage.php?selectedId=". $selectedId;
    header("Refresh:0");
  }

 function getVoteInfo($file_db) {
 $sql_select='SELECT * FROM vote';
 $result = $file_db->query($sql_select);
 if (!$result) die("Cannot execute query.");
  $projects = [];
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $projects[] = [
        'id' => $row['Id'],
          'userEmail' => $row['userEmail'],
          'currentUser' => $row['currentUser'],
          'topic' => $row['topic'],
          'createDate' => $row['createDate'],
          'createTime' => $row['createTime'],
          'agree' => $row['agree'],
          'disagree' => $row['disagree']
      ];
  }
  return $projects;
 }
 ?>
<!doctype html>
<html lang="en" style="height:100%">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sample Contact and FahrenHeit/Celsius Form </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var showLoginMessage = <?php echo json_encode($showLoginMessage); ?>;
var currentUser = <?php echo json_encode($currentUser); ?>;
var tableData = <?php echo json_encode($tableData); ?>;
var adminModel = <?php echo json_encode($adminModel); ?>;
</script>
<script src="../navbar.js">
</script>
<script src="../vote/voteAdmin.js">
</script>
<!--set some style properties::: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../masterCss.css">
 <link rel="stylesheet" href="../forum/forum.css">
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
    <button type="button" class="btn btn-primary btn-md btn-block" onclick="postNew()">POST</button>
  </div>
  <div class="container " id="loginSection">
      <div class="row">
          <div class="col-6">
             <p class="text-center">Please Login</p>
          </div>
          <div class="col-6"  align="center">
             <a href="..\signInPage\signInPage.php">Click Here</a>
          </div>
      </div>
  </div>
  <div class="container " id="replySection">
    <form name="form" action="" method="post" id="replyForm">
      <div class="form-group">
        <label for="Content">Vote Topic</label>
        <input type="text" class="form-control" name= "topic"required>
      </div>
      <button type="submit" class="btn btn-primary btn-md btn-block" >Post Vote</button>
    </form>
  </div>

  <div class="container">
    <table class="table">
   <thead>
     <tr>
       <th scope="col">Vote Topic</th>
       <th scope="col">Author</th>
       <th scope="col">Date</th>
       <th scope="col">Delete</th>
     </tr>
   </thead>
   <tbody id = "VoteTableBody">
   </tbody>
 </table>
  </div>

  </div>
</body>

</html>

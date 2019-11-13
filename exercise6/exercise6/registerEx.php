<?php
$showSucessMessgae = false;
$duplicateUserEmail = false;
try {
    $file_db = new PDO('sqlite:../db/exercise.db');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $duplicateUserEmail = false;
    $showSucessMessgae = false;
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    $tableData = getUserInfo($file_db);
    for($i=0;$i<count($tableData);$i++){
      $userNameTemp = $tableData[$i]['username'];
      if($userNameTemp == $userName){
        $duplicateUserEmail = true;
      }
    }
    if ($duplicateUserEmail == false) {
          $insertStatement =  "INSERT INTO users (username, password) VALUES ($userName,$userPassword)";
          $file_db->exec($insertStatement);
          $showSucessMessgae = true;
    }
  }

  function getUserInfo($file_db) {
    $sql_select='SELECT * FROM users';
    $result = $file_db->query($sql_select);
    if (!$result) die("Cannot execute query.");
     $projects = [];
     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
         $projects[] = [
             'username' => $row['username'],
             'password' => $row['password']
         ];
     }
     return $projects;
   }

?>

<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>register </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--set some style properties::: -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="registerEx.js"></script>
<link rel="stylesheet" href="master.css">
</head>

<body>
  <!-- signup form -->
  <div class="container title" style="width:60%">
    <h1>Exercise 6 Register Page</h1>
  </div>
  <div class="container signupForm" style="width:60%">
    <form name="form" action="" method="post">
      <div class="form-group">
        <label for="userName">User Name</label>
        <input type="text" class="form-control" name='userName' id="userName" placeholder="Enter user name" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name='userPassword' id="exampleInputPassword1" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-md btn-block">Sign  Up</button>

      <?php
      if ($duplicateUserEmail == true) {
      echo "<p>User Name Is Already Registered</p>";
      }
      if ($duplicateUserEmail == false &&  $showSucessMessgae == true) {
      echo "<p>Register Success</p>";
      }
      ?>
    </form>
  </div>
  <div class="container viewDataButton" style="width:60%" >
    <button type="button" class="btn btn-primary btn-md btn-block" onclick="viewData()">View Data</button>
  </div>
</body>

</html>

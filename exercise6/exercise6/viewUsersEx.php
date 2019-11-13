<?php
$dbMessage = "";
try {
    $file_db = new PDO('sqlite:../db/exercise.db');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    echo $e->getMessage();
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

  $tableData = getUserInfo($file_db);
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>view users ex</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript">
    var tableData = <?php echo json_encode($tableData); ?>;
</script>
<script src="viewUsersEx.js"></script>
<link rel="stylesheet" href="master.css">
</head>

<body>
  <div class="container title" style="width:60%">
    <h1>Exercise 6 View Data Page</h1>
  </div>
  <div class="container" style="width:60%">
    <table class="table">
   <thead>
     <tr>
       <th scope="col">User Name</th>
       <th scope="col">Password</th>
     </tr>
   </thead>
   <tbody id = "forumTableBody">
   </tbody>
 </table>
  </div>

<script id="noPostTemplate" type="text/x-custom-template">
<tr>
 <td>No</td>
 <td>Post</td>
 <td>Yet</td>
</tr>
</script>

</body>

</html>

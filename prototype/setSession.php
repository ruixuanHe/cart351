<?php
session_start();
echo "string";
if(isset($_POST['selectedId'])){
  $_SESSION['selectedId'] = $_POST['selectedId'];
  echo $_POST['selectedId'];
}

 ?>

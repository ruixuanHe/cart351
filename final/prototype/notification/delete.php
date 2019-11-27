<?php
    if($_GET['del'])
      {
        $deleteId = $_GET['del'];
        try {
            $file_db = new PDO('sqlite:../../db/finalProject.db');
            $file_db->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
                                    $insertStatement =  'DELETE FROM notification WHERE Id =' .$deleteId;
                                    $file_db->exec($insertStatement);
          }
          catch(PDOException $e) {
            echo $e->getMessage();
          }
  }
  ?>

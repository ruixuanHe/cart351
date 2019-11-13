<?php
try {
    /******************************************
    * Create databases and  open connections*
    ******************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../db/exercise.db');
  // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
    echo("opened or connected to the database exercise");
   }
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }

  $theQuery = 'CREATE TABLE users (Id INTEGER PRIMARY KEY, username TEXT, password TEXT)';
    $file_db ->exec($theQuery);
// if everything executed error less we will arrive at this statement
    echo ("Table users created successfully<br \>");
      // Close file db connection
       $file_db = null;
  ?>

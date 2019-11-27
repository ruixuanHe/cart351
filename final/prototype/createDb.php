<?php
try {
    /******************************************
    * Create databases and  open connections*
    ******************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../db/finalProject.db');
  // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
    echo("opened or connected to the database exercise");
   }
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }

  // $theQuery = 'CREATE TABLE users (Id INTEGER PRIMARY KEY, userEmail TEXT, userPassword TEXT)';
  //   $file_db ->exec($theQuery);
    //$theQuery = 'CREATE TABLE forum (forumId INTEGER PRIMARY KEY, userEmail TEXT, currentUser TEXT, topic TEXT,content TEXT, createDate TEXT, createTime TEXT)';

    //$file_db ->exec($theQuery);
    //$theQuery = 'CREATE TABLE forumReply (Id INTEGER PRIMARY KEY, forumId INTEGER, userEmail TEXT, currentUser TEXT, content TEXT, createDate TEXT, createTime TEXT, FOREIGN KEY(forumId) REFERENCES forum(forumId))';
    //$theQuery = 'CREATE TABLE vote (Id INTEGER PRIMARY KEY,  userEmail TEXT, currentUser TEXT, topic TEXT, createDate TEXT, createTime TEXT, agree INTEGER DEFAULT 0, disagree INTEGER DEFAULT 0)';
    //$theQuery = 'CREATE TABLE voteResult (Id INTEGER PRIMARY KEY, voteId INTEGER, userEmail TEXT, currentUser TEXT, createDate TEXT, createTime TEXT, selection INTEGER, FOREIGN KEY(voteId) REFERENCES vote(Id))';
    //$theQuery = 'CREATE TABLE userCenter (Id INTEGER PRIMARY KEY,  userEmail TEXT, name TEXT, condoUnit TEXT, fileName TEXT, tmpName TEXT, fileSize TEXT, fileType TEXT, imgContent TEXT)';
    $theQuery = 'CREATE TABLE notification (Id INTEGER PRIMARY KEY, userEmail TEXT, currentUser TEXT, topic TEXT,content TEXT, createDate TEXT, createTime TEXT)';
    $file_db ->exec($theQuery);
// if everything executed error less we will arrive at this statement
    echo ("Table users created successfully<br \>");
      // Close file db connection
       $file_db = null;
  ?>

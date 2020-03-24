<?php

/* 
 * This code allows the proxy user to connect to the database.
 */

function phpmotors_Connect(){
 $server = 'localhost';
 $dbname= 'phpmotors';
 $username = 'dev';
 $password = 'IVqpY0edji7yOKT8';
 
 $dsn = "mysql:host=$server;dbname=$dbname";
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

 // Create the actual connection object and assign it to a variable
 try {   
  $link = new PDO($dsn, $username, $password, $options);
  //echo 'it works!';
  return $link;
 } catch(PDOException $e) {
  //echo "it didn't work" . $e->getMessage();
  header('Location: /phpmotors/view/500.php');
  exit;
 }
}

phpmotors_Connect();
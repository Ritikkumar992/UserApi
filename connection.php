<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);

   $hostName = 'localhost';
   $userName = 'root';
   $userPass = '';
   $dbName = 'userdata';

   $con = mysqli_connect($hostName, $userName, $userPass, $dbName);

   // if (!$con) {
   //    echo "Connection failed: " . mysqli_connect_error();
   // } else {
   //    echo "Connection successful";
   // }
?>
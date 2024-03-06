<?php

  require 'connection.php';

  $users="SELECT id, username, email FROM user";
  $result=mysqli_query($con,$users);


  if(mysqli_num_rows($result)>0){


    while($row=$result->fetch_assoc()){

      $response['users'][]=$row;
      $response['status']="200";
    }
  }
  else{

    $response['status']="400";
    $response['users'][]="";


  }

  
  echo json_encode($response);
    
?>
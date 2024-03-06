<?php 

  	require 'connection.php';

    $id=$_REQUEST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];

    $update_query="UPDATE user SET username='$username', email='$email' WHERE id='$id'";
    $result=mysqli_query($con,$update_query);
    

    if($result>0){

      $fetchuser=mysqli_query($con,"SELECT id, username, email FROM user WHERE email='$email'");

    if(mysqli_num_rows($fetchuser)>0){

      while($row=$fetchuser->fetch_assoc()){
        $response["user"]=$row;
        }
        $response['status']="200";
        $response['message']="user update successfull";
      }
    else{
      $response["user"]=(object)[];
      $response['status']="400";
      $response['message']="user update but detail not fetch";

    }

    }
    else{
      $response["user"]=(object)[];
      $response['status']="400";
      $response['message']="user update failed";
    }
  	


  	echo json_encode($response);

 ?>
<?php
session_start();
include '../inc/env.php';
if(isset($_POST['submit_button'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date=date("Y-m-d");
    if(empty($title)){
       $_SESSION['error_title']="Title is missing";
       header("Location: ../index.php");
    }
    if(empty($description)){
        $_SESSION['error_description']="Description is missing";
        header("Location: ../index.php");
    }else if(strlen($description)>250){
        $_SESSION['error_description']="Description must be within 250 characters";
        header("Location: ../index.php");
    }else{
      $querry="INSERT INTO post(title, description, time) VALUES('$title','$description', '$date')";
      $insert=mysqli_query($conn,$querry);
      $_SESSION['successful_message']="Your post have been uploaded successfully!";
      header("Location: ../index.php");
    }
}else{
    echo 'Done';
}
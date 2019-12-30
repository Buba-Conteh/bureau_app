<?php
session_start();
require_once('dbconn.php');
  // $diretry="upload/";
  
//   var_dump( );
//   die;

  

  $fileName = $_FILES['profile_img']['name'];
  $tmpName = $_FILES['profile_img']['tmp_name'];
  $size = $_FILES['profile_img']['size'];
  $error = $_FILES['profile_img']['error'];
  $type = $_FILES['profile_img']['type'];
  $fileSize = $_FILES['profile_img']['size'];
  $fileName=time().'_'.$fileName;
  $folder='../img/profile/' . $fileName;
  $id=htmlspecialchars($_POST['id']);


  $result=$pdo->prepare("UPDATE users set `profile`='$fileName' WHERE `id`='$id'");
  $result=$result->execute();
  $upload=move_uploaded_file($tmpName, $folder);

  var_dump($upload);
  var_dump($fileName);
  var_dump($folder);
  var_dump($type);
  var_dump($size);
  var_dump($error);

  if($upload){


    header('location: ../index.php');
    die;
  }else{

    $_SESSION['massage']='uploading failed chooshe a smaller size file';

    header('location: ../index.php');
     
  }
  
  // die;
  // var_dump($fileName);
  // var_dump($size);
  // var_dump($tmpName);
  // var_dump($type);


// $result=$pdo->query("SELECT profile FROM users where `id`='1'");
//   $result=$result->fetch(PDO::FETCH_ASSOC);
//   var_dump($result);
// ?>

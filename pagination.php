<?php

// $end=10;
// $currentPage=isset($_GET['start'])?$_GET['start']:1;

// $start=($currentPage-1)*$end;
//  require_once('db.php');


//  $rows=$db->query("SELECT * FROM images");
//  $rows=$rows->fetchAll(PDO::FETCH_ASSOC);
//  $pagination=count($rows)/$end;

//  $lastPafination=$pagination-1;
//  $result=$db->query("SELECT * FROM images LIMIT $start,$end");

//  $result=$result->fetchAll(PDO::FETCH_ASSOC);





 function pagination($end,$db,$table){

    $currentPage=isset($_GET['start'])?$_GET['start']:1;

$start=($currentPage-1)*$end;
 require_once('db.php');


 $rows=$db->query("SELECT * FROM $table");
 $rows=$rows->fetchAll(PDO::FETCH_ASSOC);
 $pagination=count($rows)/$end;

 $lastPafination=$pagination-1;
 $result=$db->query("SELECT * FROM $table LIMIT $start,$end");

 $result=$result->fetchAll(PDO::FETCH_ASSOC);

 return $result;
 }
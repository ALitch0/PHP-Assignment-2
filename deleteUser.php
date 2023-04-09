<?php
//auth
require('shared/auth.php');

//hidden page
try{
//grab userId from the link using get
$userId = $_GET['userId'];

//check if userId is empty
if(empty($userId)){
    header('location:404.php');
    exit();
}

//connecting to database
require('shared/db.php');

//setup sql insert
$sql = "DELETE FROM cmsUsers WHERE userId = :userId";

//prepare, bind and execute the insert
$cmd= $db->prepare($sql);
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
}
catch(Exception $error){
    header('error.php');
}
//disconnect the database
$db = null;

//head back to original page admin.php
header('location:adminusers.php')
?>
<?php
//auth
require('shared/auth.php');

//hidden page
try{
//grab pageId from the link using get
$pageId = $_GET['pageId'];

//check if pageId is empty
if(empty($pageId)){
    header('location:404.php');
    exit();
}

//connecting to database
require('shared/db.php');

//setup sql insert
$sql = "DELETE FROM pages WHERE pageId = :pageId";

//prepare, bind and execute the insert
$cmd= $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();

//disconnect the database
$db = null;
}
catch(Exception $error){
    header('error.php');
    exit();
}
//head back to original page admin.php
header('location:pages.php')
?>
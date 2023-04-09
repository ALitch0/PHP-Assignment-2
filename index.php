<?php
//starting session for live admin view
 if (session_status() == PHP_SESSION_NONE){
    session_start();
}

//check if session exist
if(empty($_SESSION['cmsUser'])){
    $title="Live Site";
require('shared/header.php');
}

//display separate header if the session exist
else{
    $title="Admin View";
    require('shared/aliveheader.php');
}
if(!empty($_GET['pageId'])){
//get page id from url link
$pageId = $_GET['pageId'];
}
//if page id is mission it is automatically 1 which is the homepage
else{
    $pageId = 1;
}
//connect to database
require('shared/db.php');

//setup sql insert
$sql = "SELECT * FROM pages WHERE pageId = :pageId";

//prepare, bind and execute sql insert
$cmd = $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$page = $cmd->fetch();

echo'<h1>'.$page['pageTitle'].'</h1>
    <p>'.$page['pageContent'].'</p>
';

require('shared/footer.php');
?>
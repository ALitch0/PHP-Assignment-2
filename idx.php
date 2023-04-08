<?php
require('shared/header.php');
//get page id from url link
$pageId = $_GET['pageId'];

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
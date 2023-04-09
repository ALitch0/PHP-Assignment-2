<?php
//auth
require('shared/auth.php');

$title="Updating your Info";
require('shared/header.php');

//get info using POST
$pageId = $_POST['pageId'];
$pageTitle = $_POST['pageTitle'];
$pageContent = $_POST['pageContent'];

//validation
$ok = true;

if(empty($pageTitle)){
    echo '<p class="error">Page Title is required.</p>';
    $ok = false;
}

if(empty($pageContent)){
    echo '<p class="error">Page Content is required.</p>';
    $ok = false;
}

if($ok = true){
    require('shared/db.php');

        //setup sql insert
        $sql = "UPDATE pages SET pageTitle = :pageTitle, pageContent = :pageContent WHERE pageId = :pageId";

        //setup and fill the parameter values for safety
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':pageTitle', $pageTitle, PDO::PARAM_STR, 50);
        $cmd->bindParam(':pageContent', $pageContent, PDO::PARAM_STR);
        $cmd->bindParam('pageId', $pageId, PDO::PARAM_INT);

        //execute sql command
        $cmd->execute();

        //disconnect from db
        $db = null;

        //show confirmation
        echo'<p>Your Page Info has been updated.</p>
        <a href="pages.php">Go back to pages.</a>';
}
else{
    header('error.php');
}
?>
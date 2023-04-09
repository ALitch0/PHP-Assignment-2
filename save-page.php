<?php
//auth
require('shared/auth.php');

$title="Saving your page.";
require('shared/header.php');

//capture data using post method
$pageTitle = $_POST['pageTitle'];
$pageContent = $_POST['pageContent'];

//validation
$ok = true;

if(empty($pageTitle)){
    echo'<p class="error">Page Title is required.</p>';
    $ok = false;
}
if(empty($pageContent)){
    echo'<p class="error">Page Content is required.</p>';
    $ok = false;
}

if($ok == true){
    //connect to database
    require('shared/db.php');

    //setup sql insert
    $sql = "INSERT INTO pages (pageTitle, pageContent) VALUES (:pageTitle, :pageContent)";

    //setup and fill parameter values for safety
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageTitle', $pageTitle, PDO::PARAM_STR, 50);
    $cmd->bindParam(':pageContent', $pageContent, PDO::PARAM_STR);

    //execute sql command
    $cmd->execute();

    //disconnect from database
    $db=null;

    //show confirmation
    echo 'Your page was created successfully.
    <a href="pages.php">See the updated list.</a>';
}
require('shared/footer.php');
?>
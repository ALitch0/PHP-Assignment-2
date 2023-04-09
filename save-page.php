<?php
//auth
require('shared/auth.php');

try{
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
    echo '<p class="success">Your page was created successfully.</p>
    <a href="pages.php" class="pageNav">See the updated list.</a>';
}
}
catch(Exception $error){
    header('location:error.php');
}
require('shared/footer.php');
?>
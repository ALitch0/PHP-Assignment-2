<?php 
$title = "Edit";
require('shared/header.php');
try{
//connect to db
require('shared/db.php');

//get pageId from link using $_GET
$pageId = $_GET['pageId'];

//check if the pageId is empty
if(empty($pageId)){
    header('location:404.php');
    exit();
}

//setup and run sql query to fetch the selected record
$sql = "SELECT * FROM pages WHERE pageId = :pageId";
$cmd= $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$page = $cmd->fetch();
}
catch(Exception $error){
    header('location: error.php');
    exit();
}
?>
<h1>Edit page</h1>
  <!--form-->
<form action="updatePage.php" method="POST">
    <!--Page title-->
<label for="pageTitle">Page Title: </label>
<input type="text" name="pageTitle" id="pageTitle" value="<?php echo $page['pageTitle']?>">
    <!--Page Content-->
<label for="pageContent">Page Content: </label>
<textarea name="pageContent" id="pageContent"><?php echo $page['pageContent']?></textarea>
<input name="pageId" id="pageId" value="<?php echo $pageId; ?>" type="hidden">

<button class="btn">Submit</button>  
<?php
require('shared/footer.php');
?>
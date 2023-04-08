<?php
$title="Add new Page";
require('shared/header.php');
?>
<!--form-->
<form action="save-page.php" method="POST">
    <!--Page title-->
<label for="pageTitle">Page Title: </label>
<input type="text" name="pageTitle" id="pageTitle" placeholder="Title goes here">
    <!--Page Content-->
<label for="pageContent">Page Content: </label>
<textarea name="pageContent" id="pageContent" placeholder="Your Content..."></textarea>
<button class="btn">Submit</button>
</form>
<?php 
require('shared/footer.php');
?>
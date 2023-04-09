<?php
//auth check
require('shared/auth.php');
$title="Admin Control Panel";
require('shared/header.php');
?>
<div class="container">
<section>
    <a href="adminUsers.php">
        <h3>View Admins</h3>
        <p>View & Mange Admin users</p>
    </a>
    <a href="pages.php">
        <h3>View pages</h3>
        <p>Add/Edit/View/Delete Pages</p>
    </a>
    <a href="browseLogo.php">
        <h3>Upload logo</h3>
        <p>Upload a logo to the site</p>
    </a>
    <a href="index.php">
        <h3>View Public Site</h3>
        <p>View the live public site</p>
    </a>
</section>
</div>
<?php
require('shared/footer.php');
?>
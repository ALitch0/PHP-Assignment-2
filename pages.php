<?php 
//auth
require('shared/auth.php');

$title = "Pages";
include('shared/header.php');

//connect to the database
include('shared/db.php');

//setup sql insert
$sql="SELECT * FROM pages";

//prepare and execute the sql insert
$cmd=$db->prepare($sql);
$cmd->execute();

//fetch data to a variable 
$pages = $cmd->fetchAll();

//create a list using the varible in a loop
echo'<h1>Pages</h1>
    <!--to add new page-->
    <a href="addPage.php" class="pageNav">Add a new page</a>
    <table>
    <tr>
    <th>Title</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>';
    foreach($pages as $page){
        echo '<tr>
        <td><a href="index.php?pageId='.$page['pageId'].'">'.$page['pageTitle'].'</td>
        <td><a href="editPage.php?pageId='.$page['pageId'].'">Edit</a></td>
        <td><a href="deletePage.php?pageId='.$page['pageId'].'" onclick="return confirmDelete();">Delete</a></td>
        </tr>';
    }
    echo '</table>';

    //disconnect db
    $db = null;

    require('shared/footer.php');
    ?>
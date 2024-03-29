<?php
//auth
require('shared/auth.php');

$title = "Admin User's";
include('shared/header.php');

try{
//connect to the database
include('shared/db.php');

//setup sql insert
$sql="SELECT email, userId FROM cmsUsers";

//prepare and execute the sql insert
$cmd=$db->prepare($sql);
$cmd->execute();

//fetch data to a variable 
$users = $cmd->fetchAll();

//create a list using the varible in a loop
echo"<h1>Users List</h1>
    <a href='register.php' class='pageNav'>Add a new User</a>
    <table>
    <tr>
    <th>User's Email</th>
    <th>Edit User's Info</th>
    <th>Delete User</th>
    </tr>";
    foreach($users as $user){
    echo'<tr>
    <td>'.$user['email'].'</td>
    <td><a href = "editUser.php?userId='.$user['userId'].'">Edit</a></td>
    <td><a href = "deleteUser.php?userId='.$user['userId'].'" onclick="return confirmDelete();">Delete</a></td>
    </tr>';
    }
echo'</table>';
//disconnect the database
$db = null;
}
catch(Exception $error){
    header('location:error.php');
    exit();
}
include('shared/footer.php');
?>
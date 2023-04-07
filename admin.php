<?php 
include('shared/header.php');

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
    <table>
    <tr>
    <th>User's Email</th>
    <th>Edit User's Info</th>
    <th>Delete User</th>
    </tr>";
    foreach($users as $user){
    echo'<tr>
    <td>'.$user['email'].'</td>
    <td><a href = "editUser.php?UserId='.$user['userId'].'">Edit</a></td>
    <td><a href = "deleteUser.php?userId='.$user['userId'].'" onclick="return confirmDelete();">Delete</a></td>
    </tr>';
    }
echo'</table>';
//disconnect the database
$db = null;
include('shared/footer.php');
?>
<?php
$title="Updating your Info";
require('shared/header.php');

//get info using POST
$userId = $_POST['userId'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

//validation
$ok = true;

if(empty($email)){
    echo '<p class="error">Email is required.</p>';
    $ok = false;
}

//checking email format
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo'<p class="error">Email format is incorrect.</p>';
    $ok = false;
}

if(empty($password)){
    echo '<p class="error">Password is required.</p>';
    $ok = false;
}

if($password != $confirm){
    echo'<p class="error">Password must match.</p>';
    $ok = false;
}

if($ok = true){
    require('shared/db.php');

    //checking if the user exists
    $sql = "SELECT * FROM cmsUsers WHERE email = :email";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email',$email, PDO::PARAM_STR, 50);
    $cmd->execute();
    $cmsUsers = $cmd->fetch();

    //update if this returns data
        //setup sql insert
        $sql = "UPDATE cmsUsers SET email = :email, password = :password WHERE userId = :userId";

        //setup and fill the parameter values for safety
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
        $cmd->bindParam('userId', $userId, PDO::PARAM_INT);

        //hash the password before binding it to the password parameter
        $password = password_hash($password, PASSWORD_DEFAULT);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

        //execute sql command
        $cmd->execute();

        //disconnect from db
        $db = null;

        //show confirmation
        echo"<p>Your User Info has been updated.</p>
        <a href='admin.php'>Back to User's List";

}
?>
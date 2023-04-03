<?php 
//hidden page
//capture the input using $_POST
$email = $_POST['email'];
$password = $_POST['password'];

//connect
require('shared/db.php');

//check if email exist
$sql = "SELECT * FROM cmsUsers WHERE email= :email";
$cmd = $db->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
$cmd->execute();
$cmsUsers = $cmd->fetch();

if(empty($cmsUsers)){
    $db=null;
    header('location:login.php?valid=false');
    exit();
}
else{
    //check if hashed password exists
    if(password_verify($password, $cmsUsers['password'])==false){
        $db= null;
        header('location:login.php?valid=false');
        exit(); 
    }
    else{
        //if both credentials are found, store the user idnetity in the $_SESSION
        session_start();
        $_SESSION['cmsUsers'] = $email;
        header('location:admin.php');
        $db= null;
    }
}
?>


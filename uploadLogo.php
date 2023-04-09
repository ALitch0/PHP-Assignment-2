<?php
//auth check
require('shared/auth.php');

require('shared/header.php');

//get the photo using $_FILES and set name
$photo = $_FILES['photo'];
$name = $photo['name'];

//location in server cache
$tmp_name = $photo['tmp_name'];

$ok = true;

//ensure the file is jpg or png
$type = mime_content_type($tmp_name);
if($type !="image/png" && $type != "image/jpeg"){
    echo 'Please Upload a .png or .jpg file';
    $ok = false;
}


//create a unique name and save the photo
$name = session_id(). '-' .$photo['name'];
move_uploaded_file($tmp_name,'logo/' . $name);

if($ok == true){
    require('shared/db.php');

    //setup sql insert
    $sql = "INSERT INTO logos (logo) VALUES (:logo)";

    //map input to db column
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':logo', $name, PDO::PARAM_STR, 200);

    //execute the insert
    $cmd->execute();

    //disconnect
    $db=null;

    echo 'Logo uploaded successfully.';
}


require('shared/footer.php');
?>
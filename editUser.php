<?php 
$title = "Edit";
require('shared/header.php');
try{
//connect to db
require('shared/db.php');

//get userId from link using $_GET
$userId = $_GET['userId'];

//check if the userId is empty
if(empty($userId)){
    header('location:404.php');
    exit();
}

//setup and run sql query to fetch the selected record
$sql = "SELECT * FROM cmsUsers WHERE userId = :userId";
$cmd= $db->prepare($sql);
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
$user = $cmd->fetch();
}
catch(Exception $error){
    header('location: error.php');
    exit();
}
?>
<h1>Edit User</h1>
<!--Instruction-->
<h5>Passwords must be a minimum of 8 characters,
        including 1 digit, 1 upper-case letter, and 1 lower-case letter.
    </h5>
    <!--form starts here-->
    <form method="post" action="updateUser.php">
    <!--Email field-->
    <fieldset>
            <label for="email">Email: *</label>
            <input name="email" id="email" required type="email" value="<?php echo $user['email']; ?>">
    </fieldset>
    <!--Password field-->
    <fieldset>
        <label for="password">Password: *</label>
        <input type="password" name="password" id="password" required 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
    </fieldset>
    <!--Confirm Password field-->
    <fieldset>
        <label for="confirm">Confirm Password: *</label>
        <input type="password" name="confirm" id="confirm" required
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        onkeyup =" return comparePasswords();"/>              
        <span id="pwMsg" class="error"></span>
   </fieldset>
   <input name="userId" id="userId" value="<?php echo $userId; ?>" type="hidden">
   <button class="btn" onclick="return comparePasswords();">Update</button>
    </form>
<?php
require('shared/footer.php');
?>
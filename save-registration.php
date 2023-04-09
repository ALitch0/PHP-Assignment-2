<?php
$title = 'Saving your registration';
require('shared/header.php')
?>
    <?php
    
    //capture data using POST method
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

    if($ok == true){
        require('shared/db.php');

    //duplicate check
    $sql = "SELECT * FROM cmsUsers WHERE email = :email";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email',$email, PDO::PARAM_STR, 50);
    $cmd->execute();
    $cmsUsers = $cmd->fetch();

    //create new user if the query for this username returns no data
        if(empty($cmsUsers)){
            //setup sql insert
            $sql="INSERT INTO cmsUsers (email, password) VALUES (:email, :password)";

            //setup and fill the parameter values for safety
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);

            //hash the password before binding it to the password parameter
            $password = password_hash($password, PASSWORD_DEFAULT);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

            //execute sql command
            $cmd->execute();
            
            //disconnect from database
            $db=null;
            //show confirmation
            echo '<p class ="success">Your registration was successful.</p>
            <a href="login.php" class="pageNav">Login to your account.</a>';
        }
        else{
            echo'<p class="error">The user already exists.</p>';
        }
    }
    ?>
<?php
require('shared/footer.php')
?>
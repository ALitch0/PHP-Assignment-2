<?php
$title = 'Login Page';
require('shared/header.php');
?>
    <main>
        <h1>Login</h1>
        <?php 
        if(!empty($_GET['valid'])){
            echo '<p class="error">Invalid Login</p>';
        }
        else{
            echo '<h5>Please enter your credentials.</h5>';
        }
        ?>
        <!--Form starts here-->
        <form method="post" action="validate.php">
            <!--Email field-->    
            <fieldset>
            <label for="email">Email:</label>
            <input name="email" id="email" required type="email" placeholder="Enter Your Email">
            </fieldset>
            <!--Password Field-->
            <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            </fieldset>
            <button class="btn">Login</button>
            <!--Form ends-->
        </form>
    </main>
    <?php
    require('shared/footer.php');
    ?>
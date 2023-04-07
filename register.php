<?php
$title = 'Register';
require('shared/header.php');
?>
    <h1>User Registeration</h1>
    <!--Instruction-->
    <h5>Passwords must be a minimum of 8 characters,
        including 1 digit, 1 upper-case letter, and 1 lower-case letter.
    </h5>
    <!--form starts here-->
    <form method="post" action="save-registration.php">
    <!--Email field-->
    <fieldset>
            <label for="email">Email: *</label>
            <input name="email" id="email" required type="email" placeholder="Enter an Email" />
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
   <button class="btn" onclick="return comparePasswords();">Register</button>
    </form>
<?php
require('shared/footer.php');
?>
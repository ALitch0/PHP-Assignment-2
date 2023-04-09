<?php
//auth check
require('shared/auth.php');

require('shared/header.php');
?>
<form method="post" action="uploadLogo.php" enctype="multipart/form-data">
<label for="photo">Choose your photo</label>    
<input type="file" name="photo" accept=".png,.jpg">
    <button class="btn">Submit</button>
</form>
<?php
require('shared/footer.php');
?>
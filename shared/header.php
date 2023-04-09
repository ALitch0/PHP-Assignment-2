<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!--css-->
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="JS/app.js" defer></script>
</head>
<body>
    <header>
        <!--logo for the page-->
        <img src="#" alt="logo">
        <!--nav links-->
        <nav>
            <ul>
                <?php 
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                
                if (empty($_SESSION['cmsUser'])){
                echo 
                '<li><a href="idx.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>';
                }
                else{
                echo
                '<li><a href="adminusers.php">Users</a></li>
                <li><a href="pages.php">Pages</a></li>
                <li><a href="logout.php">Logout</a></li>
                ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
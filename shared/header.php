<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!--css-->
    <link rel="stylesheet" href="./CSS/style.css">
    <!--script-->
    <script src="./JS/app.js" defer></script>
</head>
<body>
    <header>
        <!--logo for the page-->
        <?php
        //get data for logo
        //connect to database
        require('shared/db.php');

        //setup sql insert
        $sql = "SELECT logo from logos order by logoId DESC;";

        //prepare and execute
        $cmd = $db->prepare($sql);
        $cmd->execute();

        //fetch the value
        $logo = $cmd->fetch();

        echo'<img src="logo/'.$logo['logo'].'" alt="logo" height="60px">';
        ?>
        <!--nav links-->
        <nav>
            <ul>
                <?php 
                if (session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                
                if (empty($_SESSION['cmsUser'])){
                
                    //setup sql insert for displaying pages table info
                    $sql = "SELECT * FROM pages";

                    //prepare and execute teh sql insert
                    $cmd=$db->prepare($sql);
                    $cmd->execute();
                    $pages = $cmd->fetchAll();
                
                    //create a list for nav elements using foreach loop
                    foreach($pages as $page){
                        echo'
                        <a href="index.php?pageId='.$page['pageId'].'"><li>'.$page['pageTitle'].'</li></a>
                        ';
                    }
                    //disconnect form db
                    $db = null;
                    echo 
                '<a href="login.php"><li>Login</li></a>
                <a href="register.php"><li>Register</li></a>';
                }
                else{
                echo
                '<a href="admin-control.php"><li>Admin Panel</li></a>
                <a href="adminusers.php"><li>Users</li></a>
                <a href="pages.php"><li>Pages</li></a>
                <a href="browseLogo.php"><li>Upload Logo</li></a>
                <a href="index.php"><li>Live Site</li></a>
                <a href="#"><li>'. $_SESSION['cmsUser'] . '</li></a>
                <a href="logout.php"><li>Logout</li></a>
                ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
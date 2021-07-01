<?php
    require_once('functions.php');
    require_once('database.php');
?>
<!doctype html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/app.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="content">

            <nav class="navbar navbar-light bg-light -sm">
                <a class="navbar-brand" href="index.php">Home</a>
                <?php if(isset($_SESSION['user_id'])){ echo'<a class="navbar-brand" href="authentication.php?logout">Logout</a>';}?>
                <?php if(!isset($_SESSION['user_id'])){ echo'<a class="navbar-brand" href="login.php">Sign in</a>';}?>
            </nav>
<?=sendError();?>


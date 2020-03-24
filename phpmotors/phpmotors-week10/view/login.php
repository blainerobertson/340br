<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1 class="account-heading">Sign in</h1>
            <?php
            if (isset($_SESSION['message'])) {
             echo $_SESSION['message'];
            }
            ?>
            <form method="post" action="/phpmotors/accounts/">
                <label for="email" >Email</label><br>
                <input type="text" id="email" name="email" required
                    <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>        
                ><br>
                <label for="password" >Password</label><br>
                <input type="password" id="password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="submit" value="Sign-in">
                <input type="hidden" name="action" value="Login">
                <a href="/phpmotors/accounts/?action=register-page" id="toreg">Not a member yet?</a>
            </form>
            
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>
<?php 
unset($_SESSION['message']);
?>
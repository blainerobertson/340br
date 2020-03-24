<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Content Title</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1 class="account-heading">Register</h1>
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="clientFirstname" >First Name</label><br>
                <input type="text" name="clientFirstname" id="clientFirstname" required 
                    <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>
                ><br>
                <label for="clientLastname" >Last Name</label><br>
                <input type="text" name="clientLastname" id="clientLastname" required
                       <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>
                 ><br>
                <label for="clientEmail" >Email</label><br>
                <input type="email" name="clientEmail" id="clientEmail" required
                    <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>   
                ><br>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <label for="clientPassword" >Password</label><br>
                <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                <input type="submit" value="Register">
                <input type="hidden" name="action" value="register">
            </form>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>

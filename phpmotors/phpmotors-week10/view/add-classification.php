<?php 
if($_SESSION['loggedin'] != TRUE || $_SESSION['clientData']['clientLevel'] < 2){
    header("Location: ../");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>New Classification</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1 class="account-heading">Add Car Classification</h1>
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            <form action="/phpmotors/vehicles/" method="post">
                <label for="carClassification" >Classification Name</label><br>
                <input type="text" name="carClassification" id="carClassification" required><br>
                <input type="submit" value="Add Classification">
                <input type="hidden" name="action" value="add-class">
            </form>
            
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>

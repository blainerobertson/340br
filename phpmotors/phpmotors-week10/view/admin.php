<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
if($_SESSION['loggedin'] != TRUE){
    header("Location: ../");
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Vehicle Admin</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1>Admin Page</h1>
            <?php 
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?>
            <p class="margin1">Welcome <?php echo $_SESSION['clientData']['clientFirstname'] ?>, what would you like to do?</p>
            <section>
                <h2 class="margin1">Account Management</h2>
                <p class="margin1">Use this link to update account information.</p>
                <p class="margin1"><a href="/phpmotors/accounts/?action=update">Update Account Information</a></p>
            </section>
           <?php 
            if($_SESSION['clientData']['clientLevel'] > 1){
           ?>
            <section>
                <h2 class="margin1">Inventory Management</h2>
                <p class="margin1">Use this link to add new products to the web site.</p>
                <p class="margin1"><a href="/phpmotors/vehicles/">Vehicle Management</a></p>
            </section>
            <?php 
            }
           ?>
            
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
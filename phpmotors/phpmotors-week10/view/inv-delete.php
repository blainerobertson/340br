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
        <title>
            <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel']))
                    { echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
            ?>
        </title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1 class="account-heading">
                <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel']))
                    { echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
                ?>
            </h1>
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            <p class="center red">Confirm Vehicle Deletion. The delete is permanent.</p>
            <form action="/phpmotors/vehicles/" method="post">
                <label for="invMake" >Make</label><br>
                <input type="text" name="invMake" id="invMake" readonly
                    <?php 
                    if(isset($invInfo['invMake'])) 
                        {echo "value='$invInfo[invMake]'"; }
                    ?>
                ><br>
                
                <label for="invModel" >Model</label><br>
                <input type="text" name="invModel" id="invModel" readonly
                   <?php 
                   if(isset($invInfo['invModel'])) 
                       {echo "value='$invInfo[invModel]'"; }
                    ?>   
                ><br>
                
                <label for="invDescription" >Description</label><br>
                <textarea id="invDescription" name="invDescription" readonly><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
                <br><br>
                
                <input type="submit" value="Delete Vehicle">
                <input type="hidden" name="action" value="deleteItem">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} ?>">
            </form>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>

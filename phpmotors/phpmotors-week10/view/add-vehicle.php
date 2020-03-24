<?php
if($_SESSION['loggedin'] != TRUE || $_SESSION['clientData']['clientLevel'] < 2){
    header("Location: ../");
}

$classifList = '<select name="classificationId">';
foreach ($classifications as $classification){
    $classifList .= "<option value='$classification[classificationId]'";
    
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classifList .= ' selected ';
        }
    }
    $classifList .= ">$classification[classificationName]</option>";
}
 $classifList .= '</select>';
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
        <title>New Vehicle</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1 class="account-heading">Add Vehicle</h1>
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            <p class="center">*Note all Fields are Required</p>
            <form action="/phpmotors/vehicles/" method="post">
                <?php 
                echo $classifList;
                ?><br><br>
                <label for="invMake" >Make</label><br>
                <input type="text" name="invMake" id="invMake" required
                    <?php if(isset($invMake)){echo "value='$invMake'";}  ?>
                ><br>
                
                <label for="invModel" >Model</label><br>
                <input type="text" name="invModel" id="invModel" required
                   <?php if(isset($invModel)){echo "value='$invModel'";}  ?>    
                ><br>
                
                <label for="invDescription" >Description</label><br>
                <textarea id="invDescription" name="invDescription" required><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea>
                <br><br>
                
                <label for="invImage" >Image Path</label><br>
                <input type="text" name="invImage" id="invImage" value="/phpmotors/images/no-image.png" required
                    <?php if(isset($invImage)){echo "value='$invImage'";}  ?> 
                ><br>
                
                <label for="invThumbnail" >Thumbnail Path</label><br>
                <input type="text" name="invThumbnail" id="invThumbnail" value="/phpmotors/images/no-image.png" required
                    <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> 
                ><br>
                
                <label for="invPrice" >Price</label><br>
                <input type="text" name="invPrice" id="invPrice" required
                    <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> 
                ><br>
                
                <label for="invStock" ># In Stock</label><br>
                <input type="text" name="invStock" id="invStock" required
                    <?php if(isset($invStock)){echo "value='$invStock'";}  ?>    
                ><br>
                
                <label for="invLocation" >Vehicle Location</label><br>
                <input type="text" name="invLocation" id="invLocation" required
                    <?php if(isset($invLocation)){echo "value='$invLocation'";}  ?>    
                ><br>
                
                <label for="invDealer" >Dealer</label><br>
                <input type="text" name="invDealer" id="invDealer" required
                     <?php if(isset($invDealer)){echo "value='$invDealer'";}  ?>   
                ><br>
                
                <label for="invColor" >Color</label><br>
                <input type="text" name="invColor" id="invColor" required
                    <?php if(isset($invColor)){echo "value='$invColor'";}  ?> 
                ><br>
                
                <input type="submit" value="Add Vehicle">
                <input type="hidden" name="action" value="add-vehicle">
            </form>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>

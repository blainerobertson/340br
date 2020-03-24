<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}

if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Vehicle Management</title>
        <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <main>
            <h1>Vehicle Management</h1>
            <ul>
                <li><a href="/phpmotors/vehicles/?action=class-page">Add Classification</a></li>
                <li><a href="/phpmotors/vehicles/?action=vehicle-page">Add Vehicle</a></li>
            </ul>
            <?php
                if (isset($message)) {
                 echo $message;
                } 
                if (isset($vehicleList)) {
                 echo $vehicleList;
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
<?php unset($_SESSION['message']); ?>
<?php

/* 
 * Vehicles controller
 */

// Create or access a Session
 session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
//Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
 require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
//print_r($classifications);

// Build a navigation bar using the $classifications array
 $navList = buildNavigation($classifications);

// $classifList = '<select name="classificationId">';
// $classifList .= '<option selected disabled> Choose Car Classification</option>';
// foreach ($classifications as $classification) {
//     $classifList .= '<option value="'.$classification['classificationId'].'">'.$classification['classificationName'].'</option>';
// }
// $classifList .= '</select>';
 
 
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action){
 case 'class-page':
     include '../view/add-classification.php';
     exit;
  break;

case 'add-class':
     // Filter and store the data
     $carClassification = filter_input(INPUT_POST, 'carClassification');
    
    //check data
    if(empty($carClassification)){
        $message = '<p class="center">Please provide information for all empty form fields.</p>';
        include '../view/add-classification.php';
        exit; 
    }
    
    //add to database
    $classifAdded = insertNewClassification($carClassification);
    
    if($classifAdded){
         header('Location: /phpmotors/vehicles/');
    }else{
        $message = '<p class="center">An error occured while adding the new classification to the database, pleas try again later.</p>';
        include '../view/add-classification.php';
        exit; 
    }
    
  break;

case 'add-vehicle':
    // Filter and store the data
    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
    $invDealer = filter_input(INPUT_POST, 'invDealer', FILTER_SANITIZE_STRING);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    if(empty($classificationId) || empty($invMake)|| empty($invModel)|| empty($invDescription)
            || empty($invImage)|| empty($invThumbnail)|| empty($invPrice)|| empty($invStock)
            || empty($invLocation)|| empty($invDealer)|| empty($invColor)){
        $message = '<p class="center">Please provide information for all empty form fields.</p>';
        include '../view/add-vehicle.php';
        exit; 
    }
    
    $vehicleAdded = insertNewVehicle($invMake, $invModel, $invDescription, 
            $invImage, $invThumbnail, $invPrice, $invStock, $invLocation, 
            $invDealer, $invColor, $classificationId);
    
    if($vehicleAdded){
        $message = '<p class="center">The '.$invMake.' '.$invModel.' was added successfully!</p>';
        include '../view/add-vehicle.php';
        exit;
    }else{
       $message = '<p class="center">The new vehicle could not be added at this time. Please try again later</p>';
        include '../view/add-vehicle.php';
        exit; 
    }
  break;

case 'vehicle-page':
    include '../view/add-vehicle.php';
    exit;
  break;

case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    
    if(count($invInfo)<1){
        $message = 'Sorry, no vehicle information could be found.';
    }
    
    include '../view/inv-update.php';
    
break;

case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    
    if(count($invInfo)<1){
        $message = 'Sorry, no vehicle information could be found.';
    }
    
    include '../view/inv-delete.php';
break;
 
case 'updateItem':
 $carType = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
 $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
 $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
 $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
 $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
 $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
 $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
 $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
 $invDealer = filter_input(INPUT_POST, 'invDealer', FILTER_SANITIZE_STRING);
 $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

 
 if (empty($carType) || empty($invMake) || empty($invModel) || empty($invDescription) 
         || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) 
         || empty($invLocation) || empty($invDealer) || empty($invColor)) {
    $message = '<p class="center">Please complete all information to update vehicle! Double check the classification of the item.</p>';
    include '../view/inv-update.php';
    exit;
  }  
$updateResult = updateItem($carType, $invMake, $invModel, $invDescription, 
                           $invImage, $invThumbnail, $invPrice, $invStock, 
                           $invLocation, $invDealer, $invColor, $invId);
 if ($updateResult) {
    $message = "<p class='center'>Congratulations, the $invMake $invModel was successfully updated.</p>";
    $_SESSION['message'] = $message;
    header('location: /phpmotors/vehicles/');
    exit;
 } else {
    $message = "<p class='center'>Error. The new vehicle was not updated.</p>";
    include '../view/inv-update.php';
    exit;
}
 break;
 
case 'deleteItem':
 $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
 $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

  
$deleteResult = deleteItem($invId);

 if ($deleteResult) {
    $message = "<p class='center'>Congratulations, the $invMake $invModel was successfully deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /phpmotors/vehicles/');
    exit;
 } else {
    $message = "<p class='center'>Error: The $invMake $invModel was not deleted. Try again later</p>";
    $_SESSION['message'] = $message;
    header('location: /phpmotors/vehicles/');
    exit;
}
 break;
 
case 'classification':
 $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
 $vehicles = getVehiclesByClassification($classificationName);
 if(!count($vehicles)){
  $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
 } else {
    $vehicleDisplay = buildVehicleDisplay($vehicles);
 }
 include '../view/classification-vehicles.php';
 break;
 
 default:
     $vehicles = getVehicleBasics();
     
     if(count($vehicles) > 0){
        $vehicleList = '<table class="margin1">';
        $vehicleList .= '<thead class="margin1">';
        $vehicleList .= '<tr><th>Vehicle Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $vehicleList .= '</thead>';
        $vehicleList .= '<tbody>';
        foreach ($vehicles as $vehicle) {
         $vehicleList .= "<tr><td>$vehicle[invMake] $vehicle[invModel]</td>";
         $vehicleList .= "<td><a href='/phpmotors/vehicles?action=mod&id=$vehicle[invId]' title='Click to modify'>Modify</a></td>";
         $vehicleList .= "<td><a href='/phpmotors/vehicles?action=del&id=$vehicle[invId]' title='Click to delete'>Delete</a></td></tr>";
        }
         $vehicleList .= '</tbody></table>';
    } else {
        $message = '<p class="notify">Sorry, no vehicles were returned.</p>';
    }
     
     include '../view/vehicle-man.php';
     exit;
  break;
  
}
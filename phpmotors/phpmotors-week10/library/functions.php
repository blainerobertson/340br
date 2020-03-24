<?php

/* 
 * Custom functions for PHP Motors
 */

function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
 return preg_match($pattern, $clientPassword);
}

//build navigation
function buildNavigation($classifications){
    
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
     $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul>';
    
    return $navList;
}

// Check for an existing email address
function checkExistingEmail($clientEmail) {
 $db =  phpmotors_Connect();
 $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
 $stmt->execute();
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 $stmt->closeCursor();
 if(empty($matchEmail)){
  return 0;
 } else {
  return 1;
 }
}

//this function builds the html output when a navigation link is chosen
function buildVehicleDisplay($vehicles){
 $pd = '<ul id="inv-display">';
 foreach ($vehicles as $vehicle) {
  $pd .= '<li>';
  $pd .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on Acme.com'>";
  $pd .= '<hr>';
  $pd .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
  $pd .= "<span>$vehicle[invPrice]</span>";
  $pd .= '</li>';
 }
 $pd .= '</ul>';
 return $pd;
}
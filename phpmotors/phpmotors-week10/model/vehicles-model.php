<?php

/* 
 * Vehicle Model
 */

function insertNewClassification($classificationName){
    $db = phpmotors_Connect();
    
    $sql = 'INSERT INTO carclassification (classificationName) VALUES (:classificationName)';
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    
    $stmt->execute();
    
    $rowsChanged = $stmt->rowCount();
    
    $stmt->closeCursor();
    
    return $rowsChanged; 
}

function insertNewVehicle($invMake, $invModel, $invDescription, $invImage, 
        $invThumbnail, $invPrice, $invStock, $invLocation, $invDealer, 
        $invColor, $classificationID){
    
    $db = phpmotors_Connect();
    
    $sql = 'INSERT INTO inventory '
            . '(invMake, invModel, invDescription, invImage, invThumbnail, '
            . 'invPrice, invStock, invLocation, invDealer, invColor, classificationID) '
            . 'VALUES (:invMake, :invModel, :invDescription, :invImage, :invThumbnail, '
            . ':invPrice, :invStock, :invLocation, :invDealer, :invColor, :classificationID);';
   
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':invDealer', $invDealer, PDO::PARAM_STR);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':classificationID', $classificationID, PDO::PARAM_STR);
    
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged; 
}

function getVehicleBasics() {
 $db = phpmotors_Connect();
 $sql = 'SELECT invMake, invModel, invId FROM inventory ORDER BY invMake ASC';
 $stmt = $db->prepare($sql);
 $stmt->execute();
 $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $vehicles;
}

// Get vehicle information by invId
function getInvItemInfo($invId){
 $db = phpmotors_Connect();
 $sql = 'SELECT * FROM inventory WHERE invId = :invId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
 $stmt->execute();
 $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $invInfo;
}

// Update a vehicle
function updateItem($carType, $invMake, $invModel, $invDescription, 
                           $invImage, $invThumbnail, $invPrice, $invStock, 
                           $invLocation, $invDealer, $invColor, $invId) {
// Create a connection
$db = phpmotors_Connect();
// The SQL statement to be used with the database
$sql = 'UPDATE inventory SET invMake = :invMake, invModel = :invModel, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invLocation = :invLocation, classificationId = :carType, invDealer = :invDealer, invColor = :invColor WHERE invId = :invId';
$stmt = $db->prepare($sql);
$stmt->bindValue(':carType', $carType, PDO::PARAM_INT);
$stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
$stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
$stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
$stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
$stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
$stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
$stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
$stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
$stmt->bindValue(':invDealer', $invDealer, PDO::PARAM_STR);
$stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged;
}

function deleteItem($invId) {
 $db = phpmotors_Connect();
 $sql = 'DELETE FROM inventory WHERE invId = :invId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
 $stmt->execute();
 $rowsChanged = $stmt->rowCount();
 $stmt->closeCursor();
 return $rowsChanged;
}

function getVehiclesByClassification($classificationName){
 $db = phpmotors_Connect();
 $sql = 'SELECT * FROM inventory WHERE classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName)';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
 $stmt->execute();
 $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $vehicles;
}
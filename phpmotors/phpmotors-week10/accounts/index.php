<?php

/* 
 * Accounts Controller
 */

// Create or access a Session
 session_start();

// Get the database connection file
 require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
 require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();
//print_r($classifications);

// Build a navigation bar using the $classifications array
 $navList = buildNavigation($classifications);

//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

switch ($action){
    case 'login-page':
        include '../view/login.php';
    break;

    case 'register-page':
        include '../view/registration.php';
    break;

    case 'register':
         // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        
        //chaeck that values are the correct format
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        
        //check if email exists
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
         $message = '<p class="center">That email address already exists. Do you want to login instead?</p>';
         include '../view/login.php';
         exit;
        }
        
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p class="center">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }
        
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "<p class='center'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p class='center'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
    break;
    
    case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        
        // Check for missing data
        if(empty($clientEmail) || empty($clientPassword)){
            $message = '<p class="center">Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit; 
        }
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
          $message = '<p class="notice">Please check your password and try again.</p>';
          include '../view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
    break;
    
    case 'update':
        include '../view/client-update.php';
        break;
    
    case 'acct-update':
         // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        
        if($clientEmail != $_SESSION['clientData']['clientEmail']){
            //chaeck that values are the correct format
            $clientEmail = checkEmail($clientEmail);

            //check if email exists
            $existingEmail = checkExistingEmail($clientEmail);

            // Check for existing email address in the table
            if($existingEmail){
             $_SESSION['message'] = '<p class="center">That email address already exists. Please chose another.</p>';
             include '../view/client-update.php';
             exit;
            }
        }
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $_SESSION['message'] = '<p class="center">Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
        }
        
        // Send the data to the model
        $updateOutcome = updateClient($clientFirstname, $clientLastname, $clientEmail, $id);
        
        // Check and report the result
        if($updateOutcome){
            $_SESSION['clientData'] = getAccountByID($id);
            $_SESSION['message'] = "<p class='center'>$clientFirstname, Yor information has been updated.</p>";
            header('Location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] = "<p class='center'>Sorry $clientFirstname, we could not update your account information. Please try again.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;
   
    case 'pass-update':
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $checkPassword = checkPassword($clientPassword);
        
        if(!empty($clientPassword) && $checkPassword){
            // Hash the checked password
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            
            //update password
            $updatePass = updatePassword($hashedPassword, $id);
            
            if($updatePass){
                $clientFirstname = $_SESSION['clientData']['clientFirstname'];
                $_SESSION['message'] = "<p class='center'>$clientFirstname, Yor password has been updated.</p>";
                header('Location: /phpmotors/accounts/');
                exit;
            }else{
               $_SESSION['message'] = "<p class='center'>An error occured and we could not update your password.</p>";
               header('Location: /phpmotors/accounts/');
               exit;
            }            
        }else{
            $_SESSION['message2'] = "<p class='center'>Please Make sure your password matches the desired pattern.</p>";
            include '../view/client-update.php';
            exit;
        }
        break;
    
    case 'logout':
        session_destroy();
        header('Location: /phpmotors/');
        break;

    default:
       include '../view/admin.php';
}
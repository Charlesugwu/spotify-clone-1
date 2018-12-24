<?php 

function sanitizeRegisterPassword ( $inputText ) {
  $inputText = strip_tags($inputText);
  return $inputText;
}
function sanitizeRegisterUserName ( $inputText ) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeRegisterForm ( $inputText ) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}


if(isset($_POST['registerButton'])) {

  $registerUserName = sanitizeRegisterUserName($_POST['registerUserName']);
  $registerFirstName = sanitizeRegisterForm($_POST['registerFirstName']);
  $registerLastName = sanitizeRegisterForm($_POST['registerLastName']);
  $registerEmail = sanitizeRegisterForm($_POST['registerEmail']);
  $registerEmailConfirmation = sanitizeRegisterForm($_POST['registerEmailConfirmation']);
  $registerPassword = sanitizeRegisterPassword($_POST['registerPassword']);
  $registerPasswordConfirmation = sanitizeRegisterPassword($_POST['registerPasswordConfirmation']);
 
  $wasSuccessful = $account->register($registerUserName, $registerFirstName, $registerLastName, $registerEmail, $registerEmailConfirmation, $registerPassword, $registerPasswordConfirmation);

  if($wasSuccessful == true) {
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
  }
}

?>
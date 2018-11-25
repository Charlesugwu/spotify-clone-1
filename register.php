<?php
  include ('includes/config.php');
  include ('includes/classes/Account.php');
  include ('includes/classes/Constants.php');
  $account = new Account($con);
 
  include ('includes/handlers/register-handler.php');
  include ('includes/handlers/login-handler.php');

  function getValueInput($name) {
    if (isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to Spotify!</title>
</head>
<body>

<div id="inputContainer">
         <!-- the action field is the page you want to send the data to. the "for" has to correspond with the "id" -->
  <form action="register.php" method="POST" id="loginForm">
    <h2>Login to your account</h2>
    <p>   
    <?php echo $account->getError(Constants::$loginFailed); ?>  
      <label for="registerUserName">Username</label>
      <input type="text" id="registerUserName" name="registerUserName" placeholder="e.g. bartSimpson" required></p>
    
    <p>
      <label for="registerPassword">Password</label>
      <input type="password" id="registerPassword" name="registerPassword" placeholder="Your password" required>
    </p>

    <button type="submit" name="loginButton">Login</button> 
    
  </form>
 
  <form action="register.php" method="POST" id="registerForm">
    <h2>Create your free account</h2>
    <p>     
     <?php echo $account->getError(Constants::$unLength); ?>
     <?php echo $account->getError(Constants::$userNameTaken); ?>
      <label for="registerUserName">Username</label>
      <input type="text" id="registerUserName" name="registerUserName" value="<?php getValueInput('registerUserName') ?>" placeholder="e.g. bartSimpson" required></p>
    <p>
    <?php echo $account->getError(Constants::$fnLength); ?>
      <label for="registerFirstName">First Name</label>
      <input type="text" id="registerFirstName" name="registerFirstName" value="<?php getValueInput('registerFirstName') ?>" placeholder="e.g. Bart" required>
    </p>
    <p>
    <?php echo $account->getError(Constants::$lnLength); ?>
      <label for="registerLastName">Last Name</label>
      <input type="text" id="registerLastName" name="registerLastName" value="<?php getValueInput('registerLastName') ?>" placeholder="e.g. Simpson" required>
    </p>
    <p>
    <?php echo $account->getError(Constants::$emInvalid); ?>
    <?php echo $account->getError(Constants::$emsDoNotMatch); ?>
    <?php echo $account->getError(Constants::$emTaken); ?>
      <label for="registerEmail">Email</label>
      <input type="email" id="registerEmail" name="registerEmail" value="<?php getValueInput('registerEmail') ?>" placeholder="bartsimpson@gmail.com" required>
    </p>
    <p>
      <label for="registerEmailConfirmation">Confirm email</label>
      <input type="email" id="registerEmailConfirmation" name="registerEmailConfirmation" value="<?php getValueInput('registerEmailConfirmation') ?>" placeholder="bartsimpson@gmail.com" required>
    </p>
    <p>
    <?php echo $account->getError(Constants::$pwAlphaNumeric); ?>
    <?php echo $account->getError(Constants::$pwLength); ?> 
    <?php echo $account->getError(Constants::$pwsDoNotMatch); ?>
      <label for="registerPassword">Password</label>
      <input type="password" id="registerPassword" name="registerPassword" placeholder="Your password" required>
    </p>
    <p>
      <label for="registerPasswordConfirmation">Confirm password</label>
      <input type="password" id="registerPasswordConfirmation" name="registerPasswordConfirmation"  placeholder="Your password" required>
    </p>        
    <button type="submit" name="registerButton">Sign up</button>
  </form>


</body>
</html>
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to Spotify!</title>
  <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

<div class="background">
  <div id="loginContainer">
    <div id="inputContainer">
            <!-- the action field is the page you want to send the data to. the "for" has to correspond with the "id" -->
      <form action="register.php" method="POST" id="loginForm">
        <h2>Login to your account</h2>
        <p>   
        <?php echo $account->getError(Constants::$loginFailed); ?>  
          <label for="loginUserName">Username</label>
          <input type="text" id="loginUserName" name="loginUserName" 
          value="<?php getValueInput('loginUserName') ?>"placeholder="e.g. bartSimpson" required></p>
        
        <p>
          <label for="loginPassword">Password</label>
          <input type="password" id="loginPassword" name="loginPassword" placeholder="Your password" required>
        </p>

        <button type="submit" name="loginButton">Login</button> 
        <div class="confirmAccount">
          <a href="#">
          <span id="hideLogin">Don't have an account yet? Signup here.</span>
          </a>
        </div>
        
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
        <div class="confirmAccount">
          <a href="#">
          <span id="hideRegister">Already have an account? Log in here.</span>
          </a>
        </div>
      </form>
    </div><!-- end inputContainer -->
    <div id="loginText">
      <h1>Get great music right now</h1>
      <h2>Listen to songs for free</h2>
      <ul>
        <li>Discover music you'll fall in love with</li>
        <li>Create you own playlist</li>
        <li>Follow artist to keep up to date</li>
      </ul>
    </div>
  </div><!-- end loginContainer -->
</div><!-- end background container --> 

<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="assets/js/register.js"></script>

<!-- // keeps register page up when there are errors -->
<?php
if(isset($_POST['registerButton'])) {
  echo '<script>
        $(document).ready(function() {
          $("#loginForm").hide();
          $("#registerForm").show();
        });
    </script>';
} 
else {
    echo '<script>
        $(document).ready(function() {
          $("#loginForm").show();
          $("#registerForm").hide();
        });
    </script>';
}
?>

</body>
</html>
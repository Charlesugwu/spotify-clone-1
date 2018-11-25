
<?php
if(isset($_POST['loginButton'])) {
  //if login button was pressed {do this}
  $username = $_POST['registerUserName'];
  $password = $_POST['registerPassword'];

  $result = $account->login($username, $password);
  if($result == true) {
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
  }
}

?>
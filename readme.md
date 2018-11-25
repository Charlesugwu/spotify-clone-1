Spotify Clone

Create form
  login
  all fields required
  register
  all fields required
  name it register.php
  
Test
  if (isset($_POST['loginButton'])) {
    // if the login button was pressed
    echo 'login button was pressed';
  }
  if (isset($_POST['registerButton'])) {
    echo 'register button was pressed';
  }

Sanitize input
  $ = _POST['$'];
  strip tags strip_tags($);
  replace tags str_replace("replace this", "with this", "for $");
    duplicate with other input, but include 
      ucfirstname(strtolower($));
  Create a function for all the user inputs
    function sanitizeFormUsername($inputText) {}
    function sanitizeFormString($inputText) {}
    function sanitizeFormPassword(inputText) {}
  Remember to call function
    hint- you want to compile information after register button is pressed
      $ = functionName(_POST['$']);
      there should be 3 functions and 7 function calls
  Separate sanitize functions
    copy functions and calls into "/includes/handlers" file
    name it register-handler.php

Validate input
  Create function to validate inpute
    functionName($un){} 
      there should be 5
    hint- Some may have 2 parameters
  Call functions (beneath other calls)
    there should be 5

Create class
  folder /includes/handlers/classes
  Account.php (classes are always uppercase)
  Create constructor
    public function __construct() {
      //copy all 'validate' functions from register.php file and make them private - this is best practices 
      // this information can only be called from inside of that class
    }
  Create public function __register() {
    //copy all 'validate' calls from register.php 
  }
  
Link funtions
  At this point register.php knows nothing about Account() or register()
    add $account = new Account();
    add $account->register();
    test by refreshing the web page, errors should show up because the variables are still undefined

Defining variables
  Account.php file add parameters to public function register()
    hint - use shorthand variable names
  Take the $account->register function and move it to the register-handler.php file
    add it to the sanitize ifstatement with the other calls
  The $account->register function goes at the bottom of the register-handler.php file because it needs to go after the $account = new Account() - it will be included with the include()
  Add parameters to function - use variables from ifstatement above - do not shorten

Error array
  Create private $errorArray (basically create variable at top of page)
  Add $this->$errorArray = array(); to public function__construct 

Error msgs
  Add if statements to private functions that states username must be between 5 to 25 characters if not push error into $this->errorArray and return to stop function 
  Validateusername - length
  Validatefirstname - length
  Validatelastname - length 
  Validateemails - 2 (length, validate email)
  Validatepassword - 3 checks (match, alphanumeric characters,length)

Error validation
  In register-handler.php file add parameters to $account->register - variables from registerButton if statment above
  Make $account->register into a variable called $wasSuccessful
  Add ifstatement redirecting to index.php

Check validation
  Create function to check errors
  Add function to register.php page to check for specific errors
    <?php echo $account->getError(") >



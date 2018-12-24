  after users register, will they be asked to confirm email address before logging in for the first time.
    - could put a message page stating "please check email for account confirmation."
    - or 
    - since register will automatically take user to login when complete, add message to login screen.
        - but will need to block them from signing in until email is confirmed.
        - then also have email link take user back to login page.

PHP AND JS

function Audio(params) {

  this.currentlyPlaying;
  this.audio = document.createElement('audio');

  this.setTrack = function(src) {
    this.audio.src = src;
  }
}

To create a 'class' in js you use a function.

Property = this.audio = document.createElement('audio'); is the same as creating private variarables in a php class.
*the 'audio' comes from the audio object that was created. JS has an 'Audio' Object with Methods including play().

The 'setTrack' is to get the song. Maybe better named 'callTrack'.
let the audio(this) or this function 

Add script page to header.php
To execute:
<script>
  var audioElement = new Audio();
  aduioElement.setTrack("assets/music/bensound-slowmotion.mp3");
  audioElement.audio.play()
</script>

Create a new instance of Audio object. new Audio();

audioElelemt.setTrack =
new audio instance.setTrack(src);
*once you create a new instance you don't have to refer to "this" any more? You will be borrowing the elements inside.

audioElement.audio.play();
new audio instance.play the audio()
*you need to refer to the variable "this.audio" that was created inside the audio object, because that's the one you want to run.

refer to:
https://www.w3schools.com/jsref/dom_obj_audio.asp for info on Audio Object Methods and Properties
 
UNDERSTANDING QUERIRES

<?php
$songQuery = mysqli_query($con, "SELECT id FROM song ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
  array_push($resultArray, $row['id']);
}
?>

translated: $songQuery = query to mysqli databse( $con is the route to the base, "select the 'id' row from the 'song' table. order by random. limit 10 songs);

Create and empty array to add songs to. call it $resultArray;

While(the app is querying the database and fetching the information using the $songQuery equation, assign it the variable $row.) {
  push songs into an array -
  the params are (push where?, what?)
}push(into empty array $resultArray, the songs that were 'fetched' and changed to the variable $row)

*** after this is done, you'll need to convert the gathered php information into javascript. It must be converted into json so the js can read it. While still in php use:

$jsonArray = json_encode($resultArray);

then in js:

<script>
  console.log( <?php echo $jsonArray; ?> );
</script>

UNDERSTANDING JAVA SCRIPT AND EXECUTION


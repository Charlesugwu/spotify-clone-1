<?php
$songQuery = mysqli_query($con, "SELECT id FROM song ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
  array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>
  $(document).ready( function() {
    currentPlaylist = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);
  });

  function setTrack(trackId, newPlaylist, play) {
    $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {
        var track = JSON.parse(data);

        $(".trackName span").text(track.title);

        $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
          var artist = JSON.parse(data);

          $(".artistName span").text(artist.name);
        });

        $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
          var album = JSON.parse(data);

          $(".albumLink img").attr("src", album.artworkPath);
        });

        audioElement.setTrack(track);
        playSong();
    });

    if(play == true) {
      audioElement.play();
    }
    
  }

  function playSong() {
    if(audioElement.audio.currentTime == 0) {
      $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
      }

    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
    
  }

  function pauseSong() {
    $(".controlButton.pause").hide();
    $(".controlButton.play").show();
    audioElement.pause();
   
  }

</script>

 



<div id="nowPlayingBarContainer">

<div id="nowPlayingBar">

  <div id="nowPlayingLeft">
    <div class="content">
      <span class="albumLink">
        <img src="assets/images/album-cover/juliette.png" class="albumArtwork" alt="">
      </span>
      <div class="trackInfo">
        <span class="trackName"><span></span></span>
        <span class="artistName"><span></span></span>
      </div>
    </div>
  </div>

  <div id="nowPlayingCenter">
    <div class="content playerControls">
      <div class="buttons">
        <button class="controlButton shuffle" title="Shuffle button">
          <img src="assets/icons/icons8-shuffle.png" alt="Shuffle">
        </button>
        
        <button class="controlButton previous" title="Previous button">
          <img src="assets/icons/icons8-chevron_left_filled.png" alt="Previous">
        </button>
        
        <button class="controlButton play" title="Play button" onclick="playSong()"> 
          <img src="assets/icons/icons8-play_filled.png" alt="Play">
        </button>

        <button class="controlButton pause" title="Pause button" onclick="pauseSong()" style="display: none;" >
          <img src="assets/icons/icons8-pause_filled.png" alt="Pause">
        </button>
        
        <button class="controlButton next" title="Next button">
          <img src="assets/icons/icons8-chevron_right_filled.png" alt="Next">
        </button>
        
        <button class="controlButton repeat" title="Repeat button">
          <img src="assets/icons/icons8-repeat.png" alt="Repeat">
        </button>
      </div>
      <div class="playbackBar">
        <span class="progressTime current">0.00</span>
        <div class="progressBar">
          <div class="progressBarBkg">
            <div class="progress"></div>
          </div>
        </div>
        <span class="progressTime remaining">0.00</span>
      </div>
    </div>
  </div>

  <div id="nowPlayingRight">
    <div class="volumeBar">
      <button class="controlButton volume" title="Volume button">
        <img src="assets/icons/icons8-sound_filled.png" alt="Volume button">
      </button>
      <div class="progressBar">
          <div class="progressBarBkg">
            <div class="progress"></div>
          </div>
        </div>
    </div>

  </div>
</div> 
</
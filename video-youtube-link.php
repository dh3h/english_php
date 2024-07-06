<!DOCTYPE html>
<html>

<head>
  <title>YouTube Video Tracking</title>
</head>

<body>
  <div id="player"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    // Load the YouTube Iframe API asynchronously
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;

    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        height: '315',
        width: '560',
        videoId: 'xiPXu6az7Zw',
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    }

    function onPlayerReady(event) {
      console.log('Player is ready');
    }

    function onPlayerStateChange(event) {
      if (event.data == YT.PlayerState.PLAYING) {
        console.log('Video is playing');
      }
      if (event.data == YT.PlayerState.ENDED) {
        console.log('Video has ended');
        // Here you can trigger an action, like marking video as watched
        // Example: Call a PHP script via AJAX to update database or perform some action
        markVideoAsWatched();
      }
    }

    function markVideoAsWatched() {
      // Here you can perform an action to mark the video as watched, e.g., update database
      console.log('Video marked as watched');
    }


    function markVideoAsWatched() {
      // Call a PHP script via AJAX to update database
      $.ajax({
        url: 'mark_video_as_watched.php',
        method: 'POST',
        data: {
          video_id: 'xiPXu6az7Zw'
        }, // Replace with your actual video ID
        success: function(response) {
          console.log('Server response:', response);
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error:', status, error);
        }
      });
    }
  </script>
</body>

</html>
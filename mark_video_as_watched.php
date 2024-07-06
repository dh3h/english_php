<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example: Update database to mark video as watched
    $videoId = $_POST['video_id'];
    // Perform database update or other actions
    // Example:
    // $sql = "UPDATE videos SET watched = 1 WHERE video_id = ?";
    // Execute SQL query using PDO or MySQLi
    echo "Video ID '$videoId' marked as watched";
} else {
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed";
}
?>

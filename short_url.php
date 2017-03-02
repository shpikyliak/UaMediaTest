<?php

include 'classes/Database.php';
include 'classes/URL.php';

$connect = new Database();

if (isset($_POST['url'])) {
    $duplicate = $connect->getByURl($_POST['url']);

    if ($duplicate->num_rows != 0) {
        $shorturl = $duplicate->fetch_assoc()['short_url'];

    } else {
        $url = new URL($_POST['url']);
        $shorturl = $url->short_url;
        $connect->saveURL($url);
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<?php
echo "<a href='' class='short-url'>$shorturl</a>";
?>

</body>
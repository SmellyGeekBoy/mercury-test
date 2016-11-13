<?php
/**
 * Created by PhpStorm.
 * User: Rees Clissold
 * Date: 13/11/2016
 * Time: 20:46
 */

// Proof of concept
// TODO: Rewrite this in JavaScript using an AJAX HTTP Request

$ch = curl_init();
$url = 'https://medium.com/hi-my-name-is-jon/how-to-make-something-people-give-a-shit-about-c8db7d50a47a#.ad1h69qe3'; // TODO: Tale this from a form or a query string?
$api_key = file_get_contents('api.key');
$request_headers = array();
$request_headers[] = 'x-api-key: ' . $api_key;

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL, 'https://mercury.postlight.com/parser?url=' . $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

$output = json_decode(curl_exec($ch));
curl_close($ch);

$title = $output->title;
$content = $output->content; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/test.css">
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </body>
</html>
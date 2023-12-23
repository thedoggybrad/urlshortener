<?php
// Handle shortened URL requests
$shortCode = $_GET['code'];

if (!empty($shortCode)) {
    // Load the URLs from the XML file
    $xml = simplexml_load_file('urls.xml');

    // Find the URL with the matching short code
    $urlNode = $xml->xpath("//url[shortCode='$shortCode']");

    if (!empty($urlNode)) {
        $originalURL = (string)$urlNode[0]->originalURL;
        header('Location: ' . $originalURL);
        exit;
    }
}

// If the short code doesn't exist or the code parameter is empty, redirect to the root directory
header('Location: /');
exit;
?>

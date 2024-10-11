<?php
// Handle shortened URL requests
try {
    if (isset($_GET['code']) && !empty($_GET['code'])) {
        $shortCode = $_GET['code'];
        
        // Load the URLs from the XML file once
        $xml = simplexml_load_file('urls.xml');
        
        // Find the URL with the matching short code using simpler logic
        $urlNode = $xml->xpath("//url[shortCode='$shortCode']");

        if ($urlNode) {
            header('Location: ' . (string)$urlNode[0]->originalURL);
            exit;
        }
    }
    
    // Redirect to the 404 page if not found
    header("Location: 404.shtml");
    exit;
} catch (Exception $e) {
    // Handle error gracefully, could log or display error
    header("Location: 500.shtml");
    exit;
}
?>

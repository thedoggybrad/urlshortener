<?php
// Check if a URL is valid
function isValidURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Generate a short code
function generateShortCode() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 6;
    $shortCode = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $shortCode .= $characters[$randomIndex];
    }

    return $shortCode;
}

// Check if a short code already exists
function isDuplicateShortCode($xml, $shortCode) {
    foreach ($xml->url as $urlNode) {
        if ((string) $urlNode->shortCode === $shortCode) {
            return true;
        }
    }
    return false;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];

    if (isValidURL($url)) {
        // Generate a unique short code
        $xml = simplexml_load_file('urls.xml');
        $shortCode = generateShortCode();

        while (isDuplicateShortCode($xml, $shortCode)) {
            $shortCode = generateShortCode();
        }

        // Create a new URL node
        $urlNode = $xml->addChild('url');
        $urlNode->addChild('shortCode', $shortCode);
        $urlNode->addChild('originalURL', $url);

        // Save the updated XML back to the file with formatted output
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save('urls.xml');

        // Return the shortened URL as response
        $shortURL = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $shortCode;
        echo 'Shortened URL: <a href="' . $shortURL . '">' . $shortURL . '</a>';
        exit;
    } else {
        echo 'Invalid URL';
        exit;
    }
}
?>

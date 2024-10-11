<?php
// Function to check if a URL is valid
function isValidURL(string $url): bool {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Function to generate a short code
function generateShortCode(int $length = 6): string {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($characters, $length)), 0, $length);
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'] ?? '';

    // Ensure URL starts with http or https
    if (!preg_match('#^https?://#', $url)) {
        if (strpos($url, '.') === false) {
            echo 'Invalid URL';
            exit;
        }
        $url = 'https://' . $url;
    }

    if (isValidURL($url)) {
        // Load existing URLs once
        $xml = simplexml_load_file('urls.xml');
        $existingShortCodes = array_map(function($urlNode) {
            return (string) $urlNode->shortCode;
        }, iterator_to_array($xml->url));

        do {
            $shortCode = generateShortCode();
        } while (in_array($shortCode, $existingShortCodes));

        // Create a new URL node
        $urlNode = $xml->addChild('url');
        $urlNode->addChild('shortCode', $shortCode);
        $urlNode->addChild('originalURL', $url);

        // Save the updated XML back to the file with formatted output
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save('xmlstore/urls.xml');

        // Return the shortened URL
        $shortURL = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $shortCode;
        echo "<a href=\"$shortURL\">$shortURL</a>";
        exit;
    } else {
        echo 'Invalid URL';
        exit;
    }
}
?>

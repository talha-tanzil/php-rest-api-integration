<?php

$url = 'https://jsonplaceholder.typicode.com/posts';

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Execute the request
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo 'cURL Error: ' . curl_error($curl);
} else {

    // Display the API response
    echo "<pre>";
    echo $response;
    echo "</pre>";

}

// Close cURL
curl_close($curl);

?>
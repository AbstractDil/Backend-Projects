<?php
$jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjN9.2iOo6pkA1VrQ72GI3Vv95yuHNyzWnQYZ2LxvqciktwY';

$controller = new \App\Controllers\JwtController();
$payloadData = $controller->getDataFromToken($jwt);

if ($payloadData) {
    // Valid token, use the payload data
    print_r($payloadData); // Access user_id or other data
} else {
    // Invalid token
    echo "Invalid token.";
}

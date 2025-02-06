<?php

// Check if consignment_id and phone_no are provided in the URL
if (isset($_GET['consignment_id']) && isset($_GET['phone_no'])) {
    $consignment_id = $_GET['consignment_id'];
    $phone_no = $_GET['phone_no'];

    $url = "https://api.pathao.com/v1/courier/tracking";

    $headers = [
        "App-Agent: ride/android/481",
        "Android-OS: 9",
        "Authorization: Bearer vWvTesIqkPvKnPvoRfqIQivbaBZQfYvbASLWUtJT",
        "City-Id: 1",
        "Country-Id: 1",
        "Content-Type: application/json; charset=UTF-8",
        "Host: api.pathao.com",
        "Connection: Keep-Alive",
        "Accept-Encoding: gzip",
        "User-Agent: okhttp/4.12.0"
    ];

    // Create the JSON data dynamically using the values from the URL
    $data = json_encode([
        "consignment_id" => $consignment_id,
        "phone_no" => $phone_no
    ]);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        echo $response;
    }

    curl_close($ch);
} else {
    echo "Please provide both consignment_id and phone_no in the URL.";
}
?>
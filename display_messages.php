<?php
$messages = file('messages.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$maxDisplayedMessages = 1000000; 

// Define the allowed HTML tags
$allowedTags = '<a><b><i><u><img><br><p><div><span><ul><ol><li>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        header {
            background-color: #e74c3c;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            color: #fff;
        }

        .messages-container {
            width: 80%;
            margin: 20px auto;
            background-color: #34495e;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .message {
            padding: 20px;
            border-bottom: 1px solid #2c3e50;
        }

        .message time {
            font-size: 14px;
            color: #bdc3c7;
        }

        .message img {
            max-width: 100%;
            margin-top: 10px;
        }

        pre {
            white-space: pre-wrap;
            font-size: 18px;
            line-height: 1.6;
            color: #ecf0f1;
        }
    </style>
</head>
<body>
    <header>Message Board</header>

    <div class="messages-container">
        <?php
        $displayedMessages = 0;
        foreach ($messages as $message) {
            $messageParts = explode('|', $message);
            if (count($messageParts) >= 2) {
                $timestamp = (int)$messageParts[0];
                $content = $messageParts[1];

                // Allow specific HTML tags
                $sanitizedContent = strip_tags($content, $allowedTags);

                echo '<div class="message">';
                echo '<time>' . date('Y-m-d H:i:s', $timestamp) . '</time>';
                echo '<div>' . $sanitizedContent . '</div>';

                // Display the image if available
                if (count($messageParts) == 3) {
                    $imagePath = trim($messageParts[2]);
                    echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
                }

                echo '</div>';
                echo '<div style="margin-bottom: 10px;"></div>'; // Add a divider
                $displayedMessages++;

                if ($displayedMessages >= $maxDisplayedMessages) {
                    break;
                }
            }
        }

        if ($displayedMessages === 0 && !empty($messages[0])) {
            echo "<p>No messages yet.</p>";
        }
        ?>
    </div>
</body>
</html>
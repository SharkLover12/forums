<?php
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
        ?>
    </div>
</body>
</html>

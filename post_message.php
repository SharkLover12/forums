<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the username input
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');

    // Allow HTML in messages
    $message = $_POST['message'];

    // Set a character limit (adjust as needed)
    $characterLimit = 5000;

    // Truncate the message if it exceeds the character limit
    $truncatedMessage = mb_substr($message, 0, $characterLimit, 'UTF-8');

    // Prepare the data to be saved
    $data = time() . '|' . "$username: $truncatedMessage";

    // Save the data to a file (you may want to use a more robust storage method)
    file_put_contents('messages.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);

    // Check if an image was uploaded successfully
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'images/' . $_FILES['image']['name']; // Set your desired image upload path
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

        // Append the image tag to the message
        $data .= "<img src=\"$imagePath\" alt=\"Uploaded Image\">";
        file_put_contents('messages.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

// Redirect to the index.html page after processing the form
header('Location: index.html');
?>

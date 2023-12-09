<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the username input
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');

    // Allow HTML in messages
    $message = $_POST['message'];

    // Set a character limit (adjust as needed)
    $characterLimit = 500000;

    // Truncate the message if it exceeds the character limit
    $truncatedMessage = mb_substr($message, 0, $characterLimit, 'UTF-8');

    // am pretty sure this is deprecated (by me)
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . $_FILES['image']['name']; // Set your desired image upload path
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = ''; // No image uploaded
    }

    // blah blah blah
    $data = time() . '|' . "$username: $truncatedMessage\nImage: $imagePath\n";

    // blah blah blah
    file_put_contents('messages.txt', $data, FILE_APPEND | LOCK_EX);
}
header('Location: index.html'); // Redirect
?>

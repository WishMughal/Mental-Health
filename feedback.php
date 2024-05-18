<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: Check if form data is received
    var_dump($_POST);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['textarea']);

    $query = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "Thanks for your feedback!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

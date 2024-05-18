<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data (you may need more extensive validation)
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to your database (replace with your database credentials)
    include"config.php";

    // Prepare and execute SQL statement to insert user data
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $name);
    $success = $stmt->execute(); // Execute the query

    if ($success) {
        // Signup successful
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        // Signup failed
        $response = array('success' => false, 'error' => 'Failed to signup');
        echo json_encode($response);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Exit to prevent further execution
    exit;
}
?>
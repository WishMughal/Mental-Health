<?php
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    include"config.php";

    // Get username/email and password from the form
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch user details based on username/email
    $query = "SELECT * FROM users WHERE (username = '$user' OR email = '$user')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if a matching user was found
    if (mysqli_num_rows($result) == 1) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        // Verify password
        if (password_verify($password, $stored_password)) {
            // Password is correct, start the session and set session variables
            $_SESSION['user'] = $row['username'];
            // Add any additional session variables you need

            // Close database connection
            mysqli_close($conn);

            // Redirect to a dashboard or home page
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect
            $login_error = "Password is incorrect.";
        }
    } else {
        // Username/email not found
        $login_error = "Username/email not found.";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
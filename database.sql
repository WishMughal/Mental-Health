<?php 
// Start session
session_start();

// Include database connection
include('./dbConnection.php');

// Check if the login form is submitted
if(isset($_POST['stuLoginBtn'])) {
    // Fetch the login credentials from the form
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];

    // Validate the login credentials (You need to implement this)

    // Fetch stu_id from the database based on the provided email and password
    $sql = "SELECT stu_id FROM student WHERE stu_email = '$stuLogEmail' AND stu_pass = '$stuLogPass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // If login is successful

        // Fetch the stu_id from the result
        $row = $result->fetch_assoc();
        $stu_id = $row['stu_id'];

        // Set stu_id in the session
        $_SESSION['stu_id'] = $stu_id;

        // Redirect the user to the dashboard or any desired page
        header("Location: dashboard.php");
        exit();
    } else {
        // If login fails, display an error message or handle it accordingly
        $loginError = "Invalid email or password";
    }
}
?>

<?php 
  // Include header
  include('./mainInclude/header.php'); 
?>

<div class="container-fluid bg-dark">
    <!-- Course Page Banner -->
    <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm" method="post" action="">
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label><small id="statusLogMsg1"></small><input
                        type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control"
                        placeholder="Password" name="stuLogPass" id="stuLogPass">
                </div>
                <button type="submit" class="btn btn-primary" name="stuLoginBtn">Login</button>
            </form>
            <br />
            <small id="statusLogMsg"><?php if(isset($loginError)) { echo $loginError; } ?></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <!-- Registration form goes here -->
        </div>
    </div>
</div>

<hr/>

<?php 
  // Contact Us
  include('./contact.php'); 
?> 

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link rel="stylesheet" href="assets/loginstyle.css">
</head>
<body>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include your custom JavaScript -->
    <script src="assets/loginscript.js"></script>

    <!-- Login Popup -->
    <div id="loginPopup" class="popup" style="display: <?php echo isset($_SESSION['user']) ? 'none' : 'block'; ?>;">
        <div class="popup-content">
            <span class="close" onclick="closeLoginPopup()">&times;</span>
            <h2>Login</h2>
            <!-- Your login form goes here -->
            <form id="loginForm" action="login.php" method="post">
                <!-- Input fields for username and password -->
                <input type="text" placeholder="Username / Email" name="user" required>
                <input type="password" placeholder="Password" name="password" required>
                <p>Don't have an account? <a href="#" onclick="openSignupPopup(); closeLoginPopup()">Register Now</a></p>
                <!-- Login button -->
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- Signup Popup -->
    <div id="signupPopup" class="popup" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="closeSignupPopup()">&times;</span>
            <h2>Sign Up</h2>
            <!-- Your sign-up form goes here -->
            <form id="signupForm" action="signup.php" method="post" onsubmit="return validateSignupForm()">
                <!-- Input fields for full name, username, email, and password -->
                <input type="text" placeholder="Full Name" name="name" required>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="Re-Enter Password" name="re-password" required>
                <div id="passwordMismatchMessage" style="display: none; color: red;">Passwords do not match</div>
                <p>Already have an account? <a href="#" onclick="openLoginPopup(); closeSignupPopup()">Login</a></p>
                <!-- Sign-up button -->
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        function closeLoginPopup() {
            document.getElementById('loginPopup').style.display = 'none';
        }

        function closeSignupPopup() {
            document.getElementById('signupPopup').style.display = 'none';
        }

        function openSignupPopup() {
            document.getElementById('signupPopup').style.display = 'block';
        }

        function openLoginPopup() {
            document.getElementById('loginPopup').style.display = 'block';
        }

        // Event listener for Esc key to close popups
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeLoginPopup();
                closeSignupPopup();
            }
        });

        // JavaScript function to validate signup form
        function validateSignupForm() {
            var password = document.querySelector('input[name="password"]').value;
            var rePassword = document.querySelector('input[name="re-password"]').value;
            if (password !== rePassword) {
                document.getElementById('passwordMismatchMessage').style.display = 'block';
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // jQuery version
        // $(document).keydown(function(event) {
        //     if (event.key === "Escape") {
        //         closeLoginPopup();
        //         closeSignupPopup();
        //     }
        // });
    </script>
</body>
</html>
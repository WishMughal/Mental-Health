    // AJAX for login form
    $(document).on('submit', '#loginForm', function(event) {
        event.preventDefault(); // Prevent form submission
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            url: 'login.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Display success message and open new popup if login is successful
                if (response == 'success') {
                    closeLoginPopup(); // Close login popup
                    openSuccessPopup(); // Open success popup
                } else {
                    alert('Login failed. Please try again.'); // Display error message
                }
            }
        });
    });

    // AJAX for signup form
    $(document).on('submit', '#signupForm', function(event) {
        event.preventDefault(); // Prevent form submission
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            url: 'signup.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Display success message and open new popup if signup is successful
                if (response == 'success') {
                    closeSignupPopup(); // Close signup popup
                    openSuccessPopup(); // Open success popup
                } else {
                    alert('Signup failed. Please try again.'); // Display error message
                }
            }
        });
    });

    // Function to open success popup
    function openSuccessPopup() {
        // Code to open success popup goes here
        alert('Signup/Login Successful!'); // Display success message
        // You can also open another popup here
    }
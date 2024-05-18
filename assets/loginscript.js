// Open login popup
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOMContentLoaded event fired"); // Log a message when DOMContentLoaded event is fired
    document.getElementById('loginBtn').addEventListener('click', function() {
        document.getElementById('loginPopup').style.display = 'block';
    });
});

// Close login popup
function closeLoginPopup() {
    console.log("close login popup function called"); // Log a message when DOMContentLoaded event is fired  
    document.getElementById('loginPopup').style.display = 'none';
}
function openSignupPopup() {
    // Show the sign-up popup (assuming you have a signupPopup div similar to loginPopup)
    document.getElementById('signupPopup').style.display = 'block';
}
function closeSignupPopup() {
    document.getElementById('signupPopup').style.display = 'none';
}
function openLoginPopup() {
    document.getElementById('loginPopup').style.display = 'block';
}

// AJAX for signup form
document.addEventListener('DOMContentLoaded', function() {
    $('#signupForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'signup.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // If signup is successful, open a new popup window with success message
                    var newWindow = window.open('index.php', 'Signup Successful', 'width=400,height=200');
                    // Optionally, you can close the signup popup
                    closeSignupPopup();
                } else {
                    // Handle errors if needed
                }
            },
            error: function(xhr, status, error) {
                // Handle errors if needed
            }
        });
    });
});

// Password matching check
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('re-password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var rePassword = this.value;
        var message = document.getElementById('passwordMismatchMessage');
        
        if (password !== rePassword) {
            message.style.display = 'block';
            this.style.border = '1px solid red'; // Change border color to red
        } else {
            message.style.display = 'none';
            this.style.border = ''; // Reset border color
        }
    });
});



// js for login users



// Function to handle form submission
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Get form data
        var formData = new FormData(this);
        
        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'login.php?' + new URLSearchParams(formData).toString(), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Successful response
                    var response = xhr.responseText;
                    // Handle response here, e.g., show a success message or redirect to another page
                    console.log(response);
                } else {
                    // Error handling
                    console.error('Error occurred: ' + xhr.status);
                }
            }
        };
        xhr.send();
    });
});




// Function to handle login form submission
document.addEventListener('DOMContentLoaded', function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Send AJAX request to your PHP file to check login credentials
        $.ajax({
            type: 'POST',
            url: 'login_process.php', // Replace with the URL of your login process PHP file
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // If login is successful, update the login button text
                    $('#loginBtn').html('Hi! ' + response.username + ' <a href="#" onclick="logout()">Logout</a>');
                    // Close the login popup
                    closeLoginPopup();
                } else {
                    // Handle login failure (e.g., show error message)
                }
            },
            error: function(xhr, status, error) {
                // Handle errors if needed
            }
        });
    });
});

// Function to handle logout
function logout() {
    // Send AJAX request to your PHP file to logout the user
    $.ajax({
        type: 'GET',
        url: 'logout.php', // Replace with the URL of your logout PHP file
        success: function(response) {
            // Update the login button text
            $('#loginBtn').html('Login/Signup');
        },
        error: function(xhr, status, error) {
            // Handle errors if needed
        }
    });
}

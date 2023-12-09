// login.js
$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        var loginData = {
            username: $('#loginUsername').val(),
            password: $('#loginPassword').val()
        };
        
        $.ajax({
            type: 'POST',
            url: './php/login.php',
            data: loginData,
            success: function(response) {
                // Handle login response
                console.log(response);

                // Redirect user based on login success/failure
                if (response === 'success') {
                    window.location.href = 'profile.html'; // Redirect to dashboard or another authenticated page
                } else {
                    alert(response);
                    alert('Invalid credentials. Please try again.');
                }
            },
            error: function(error) {
                // Handle errors
                console.error('Login error:', error);
            }
        });
    });
});

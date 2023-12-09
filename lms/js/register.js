$(document).ready(function($) {
    $('#registerBtn').click(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        // AJAX POST request
        $.ajax({
            type: 'POST',
            url: "./php/register.php",
            data: formData,
            success: function(response) {
                // Handle successful registration response
                console.log('Registration successful:', response);
                // You can redirect the user or perform other actions here upon successful registration
                $('#username').val('');
                $('#email').val('');
                $('#password').val('');
                window.location.href = 'login.html';
            },
            error: function(error) {
                // Handle error
                console.error('Registration error:', error);
                // Display an error message to the user or perform other actions for registration failure
            }
        });
    });
});

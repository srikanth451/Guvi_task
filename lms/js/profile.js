$(document).ready(function() {
    $("#profilebtn").click(function(event) {
        event.preventDefault();
        
        var pdata = {
             dob: $("#dob").val(),
             contact: $("#contactNumber").val(),
             age: $("#age").val(),
             username: $("#username").val(),
             email: $("#email").val()
        };
        
        $.ajax({
            type: 'POST',
            url: './php/profile.php',
            data: pdata,
            success: function (response) {
                alert(response);
                console.log("successfully saved to Database", response);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        });
    });
});

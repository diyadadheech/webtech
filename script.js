$(document).ready(function() {
    $('#registrationForm').on('submit', function(event) {
        event.preventDefault(); // Prevent form from submitting normally
        
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }

        // Submit the form using AJAX
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: $(this).serialize(),
            success: function(response) {
                if (response === 'success') {
                    $('#registrationForm').hide();
                    $('#loginRedirect').show();
                } else {
                    alert('Error: ' + response);
                }
            }
        });
    });
});

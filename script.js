$(document).ready(function() {
    $('#registerBtn').click(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return;
        }

        $.post('register.php', {
            name: name,
            email: email,
            password: password
        }, function(data) {
            if (data === 'success') {
                alert('Registration successful. Please log in.');
                $('#registrationForm').hide();
                $('#loginForm').show();
            } else {
                alert('Registration failed. Please try again.');
            }
        });
    });

    $('#loginBtn').click(function() {
        var email = $('#loginEmail').val();
        var password = $('#loginPassword').val();

        $.post('login.php', {
            email: email,
            password: password
        }, function(data) {
            if (data === 'success') {
                alert('Login successful. Welcome!');
            } else {
                alert('Login failed. Please check your email and password.');
            }
        });
    });
});

$(document).ready(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '../public/index.php?action=submitRegister',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.success) {
                    $('#message').text(res.message).css('color', 'green');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    $('#message').text(res.message).css('color', 'red');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error AJAX:', xhr.responseText);
                $('#message').text('Error en el servidor. Intenta más tarde.').css('color', 'red');
            }
        });
    });
});
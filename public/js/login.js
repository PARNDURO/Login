$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/index.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.success) {
                    window.location.href = '/views/dashboard.php';
                } else {
                    $('#message').text(res.message);
                }
            },
            error: function () {
                $('#message').text('Error en el servidor. Intenta más tarde.');
            }
        });
    });
});
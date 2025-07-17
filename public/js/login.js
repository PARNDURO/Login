$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '../public/index.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.success) {
                    window.location.href = 'dashboard.php';
                } else {
                    $('#message').text(res.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error AJAX:', xhr.responseText);
                $('#message').text('Error en el servidor. Intenta más tarde.');
            }
        });
    });
});
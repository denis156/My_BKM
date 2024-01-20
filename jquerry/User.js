$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#user-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_user
    $.ajax({
        url: 'user_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var users = response.users;

            // Update elemen HTML dengan jumlah pengguna
            $('#user-count').text(users.length);
        },
        error: function(error) {
            console.error('Error fetching user data:', error);
            $('#user-count').text('Error');
        }
    });
});
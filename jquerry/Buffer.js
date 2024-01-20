$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#buffer-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_buffer
    $.ajax({
        url: 'buffer_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var buffers = response.buffers;

            // Update elemen HTML dengan jumlah pengguna
            $('#buffer-count').text(buffers.length);
        },
        error: function(error) {
            console.error('Error fetching buffer data:', error);
            $('#buffer-count').text('Error');
        }
    });
});
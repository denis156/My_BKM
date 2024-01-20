$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#receiving-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_receiving
    $.ajax({
        url: 'receiving_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var receivings = response.receivings;

            // Update elemen HTML dengan jumlah pengguna
            $('#receiving-count').text(receivings.length);
        },
        error: function(error) {
            console.error('Error fetching receiving data:', error);
            $('#receiving-count').text('Error');
        }
    });
});
$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#outside-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_outside
    $.ajax({
        url: 'outside_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var outsides = response.outsides;

            // Update elemen HTML dengan jumlah pengguna
            $('#outside-count').text(outsides.length);
        },
        error: function(error) {
            console.error('Error fetching outside data:', error);
            $('#outside-count').text('Error');
        }
    });
});
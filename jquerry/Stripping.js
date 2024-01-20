$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#stripping-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_stripping
    $.ajax({
        url: 'stripping_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var strippings = response.strippings;

            // Update elemen HTML dengan jumlah pengguna
            $('#stripping-count').text(strippings.length);
        },
        error: function(error) {
            console.error('Error fetching stripping data:', error);
            $('#stripping-count').text('Error');
        }
    });
});
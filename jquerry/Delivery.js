$(document).ready(function() {
    // Set teks "Loading..." sebelum melakukan AJAX request
    $('#delivery-count').text('Loading...');

    // Lakukan AJAX request tanpa menyertakan parameter id_delivery
    $.ajax({
        url: 'delivery_ajax.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Proses data pengguna
            var deliverys = response.deliverys;

            // Update elemen HTML dengan jumlah pengguna
            $('#delivery-count').text(deliverys.length);
        },
        error: function(error) {
            console.error('Error fetching delivery data:', error);
            $('#delivery-count').text('Error');
        }
    });
});
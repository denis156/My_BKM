<footer class="main-footer">
    <strong>Copyright &copy; By Denisa (2023)</a></strong>
    <b>My_Bkm</b>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.1.7
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets_template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets_template/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="jquerry/User.js"></script>
<script src="jquerry/Delivery.js"></script>
<script src="jquerry/Receiving.js"></script>
<script src="jquerry/Stripping.js"></script>
<script src="jquerry/Buffer.js"></script>
<script src="jquerry/Outside.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<!-- Sweetalert 2 -->
<script src="assets_template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<!-- Bootstrap 4 -->
<script src="assets_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="assets_template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets_template/dist/js/adminlte.js"></script>
<!-- bs-custom-file-input -->
<script src="assets_template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="assets_template/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets_template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets_template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="assets_template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->

<!-- overlayScrollbars -->
<script src="assets_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin keluar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout.php';
            }
        });
    }
</script>


<!-- DataTables  -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
    // Ambil semua elemen dengan kelas 'toggle-link'
    var toggleLinks = document.querySelectorAll('.toggle-link');

    // Tambahkan event listener untuk setiap elemen
    toggleLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            // Toggle kelas 'active' saat diklik
            this.classList.toggle('active');
        });
    });
</script>


</body>
</html>

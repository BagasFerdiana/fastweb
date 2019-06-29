<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; FastWEB <?= date('Y'); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Yakin Logut?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Silahkan klik tombol "Logout" untuk keluar dari website.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

 <script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm',
        });
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#datepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $('.harpok').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
        $('.harjul').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        //Ajax kabupaten/kota insert
        $("#barcode").focus();
        $("#barcode").keyup(function(){
            var kobar = {barcode:$(this).val()};
               $.ajax({
           type: "POST",
           url : "<?php echo base_url().'produk/pembelian/get_produk';?>",
           data: barcode,
           success: function(msg){
           $('#detail_produk').html(msg);
           }
        });
        });

        $("#barcode").keypress(function(e){
            if(e.which==13){
                $("#jumlah").focus();
            }
        });
    });
</script>
</body>

</html>

<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SMK Yadika 2</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url() ?>TU/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
	
	<script src="<?= base_url() ?>assets/template/js/jquery-3.5.0.js"></script>
	<script src="<?= base_url() ?>assets/template/js/sweetalert.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="<?= base_url() ?>assets/template/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url() ?>assets/template/js/demo/chart-pie-demo.js"></script> -->

  <script src="<?= base_url() ?>assets/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
	<script src="<?= base_url() ?>assets/template/js/demo/datatables-demo.js"></script>
	
	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/sweetalert/js/sweetalert2.all.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
	<script src="<?=  base_url() ?>assets/js/<?= $javascript ?>"></script>
	<script src="<?=  base_url() ?>assets/js/myJs.js"></script>
</body>

</html>

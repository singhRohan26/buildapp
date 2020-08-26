 </div>
 <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <a href=""><span>Copyright © Designoweb Technologies 2019</span></a>
          </div>
        </div>
      </footer>

 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('Admin/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
 
 
 
 <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('public') ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('public') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('public') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('public') ?>/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url('public') ?>/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url('public') ?>/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('public') ?>/js/sb-admin.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('public') ?>/js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url('public') ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('public') ?>/js/event.js"></script>
  
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script>
      $('#summernote').summernote({
        height: 350
      });
    </script>
  </body>

</html>
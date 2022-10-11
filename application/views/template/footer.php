<<<<<<< HEAD
      <hr class="featurette-divider">
      <nav class="">
        <div class="container">
          <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2020 American Wire & Cable Co., Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
          </footer>
        </div>
      </nav>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jqte/jquery-te-1.4.0.min.js') ?>"></script>
    <script>
      function deleteDocument(id) {
        r = confirm("Permanently delete record no. " + id);

        if (r) {
          window.location = '<?=site_url('admin/remove/document/')?>'+id;
        } else {
          return false;
        }
      }

      $(document).ready(function() {
        $('#masterlist-table').DataTable({
          "stateSave": true
        });
        
        $('#date').datepicker({
            todayBtn: true,
            format: 'mm/dd/yyyy',
        });

        $('#table').DataTable({
          "stateSave": true,
        });

        $('#table-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "stateSave": true,
          "ajax": "<?=site_url('main/get_documents_ajax')?>",
          columns: [
              { data: 'docnum' },
              { data: 'documenttitle' },
              { data: 'documentdesc' },
              { data: 'div_name' },
              { data: 'dept_name' },
              { data: 'effectivitydate' },
              { data: 'status' }
          ]
        });

        $('textarea').jqte();
      });
    </script>
  </body>
=======
      <hr class="featurette-divider">
      <nav class="">
        <div class="container">
          <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2020 American Wire & Cable Co., Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
          </footer>
        </div>
      </nav>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jqte/jquery-te-1.4.0.min.js') ?>"></script>
    <script>
      function deleteDocument(id) {
        r = confirm("Permanently delete record no. " + id);

        if (r) {
          window.location = '<?=site_url('admin/remove/document/')?>'+id;
        } else {
          return false;
        }
      }

      $(document).ready(function() {
        $('#masterlist-table').DataTable({
          "stateSave": true
        });
        
        $('#date').datepicker({
            todayBtn: true,
            format: 'mm/dd/yyyy',
        });

        $('#table').DataTable({
          "stateSave": true,
        });

        $('#table-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "stateSave": true,
          "ajax": "<?=site_url('main/get_documents_ajax')?>",
          columns: [
              { data: 'docnum' },
              { data: 'documenttitle' },
              { data: 'documentdesc' },
              { data: 'div_name' },
              { data: 'dept_name' },
              { data: 'effectivitydate' },
              { data: 'status' }
          ]
        });

        $('textarea').jqte();
      });
    </script>
  </body>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
</html>
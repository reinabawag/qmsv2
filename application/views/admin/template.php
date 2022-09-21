    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-md-7" >
            <img class="img-responsive center-block" src="<?php echo base_url('assets/img/output-onlinepngtools.png') ?>" alt="Amwire Old Factory Picture">
            <p><h2>Quality Management System</h2></p>
          </div>
          <div class="col-md-5">
            <img class="img-responsive center-block" src="<?php echo base_url('assets/img/amwire-pic.png') ?>" alt="Amwire Old Factory Picture">
          </div>
        </div>
      </div>
    </div>

    <div class="container marketing">
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url('assets/img/mission-circle.png') ?>" alt="Generic placeholder image" width="140" height="140">
          <br><br>
          <p class="text-justify"><?=$a->mission?></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url('assets/img/vision-circle.png') ?>" alt="Generic placeholder image" width="140" height="140">
          <br><br>
          <p class="text-justify"><?=$a->vission?></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url('assets/img/policy_logo.png') ?>" alt="Generic placeholder image" width="140" height="140">
          <br><br>
          <p class="text-justify"><?= html_entity_decode($a->policy) ?></p>
        </div>
      </div>
      
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Search Documents</h4>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-ajax" width="100%">
                  <thead>
                    <tr>
                      <th>Document Number</th>
                      <th>Document Title</th>
                      <th>Document Type</th>
                      <th>Division</th>
                      <th>Department</th>
                      <th>Effectivity Date</th>
                      <th>Status</th>
                    </tr>        
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
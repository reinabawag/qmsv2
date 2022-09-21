<div class="container">
  <h3 class="page-header"><?php echo $document['level'] ?> &middot; <?php echo $document['documentdesc'] ?></h3>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-bordered" id="table">
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
        <tbody>
          <?php 
          foreach ($docs as $doc) {
            echo "<tr>";
            echo "<td><a href=".site_url("iso/document/$doc->filename")." target='_blank'>".$doc->docnum."</a></td>";
            echo "<td>".$doc->documenttitle."</td>";
            echo "<td>".$doc->documentdesc."</td>";
            echo "<td>".$doc->div_name."</td>";
            echo "<td>".$doc->dept_name."</td>";
            echo "<td>".date('F d, Y', strtotime($doc->effectivitydate))."</td>";
            echo "<td>".$doc->status."</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<div class="container">
  <h3 class="page-header">Division &middot; <?php echo $div_name ?></h3>

  <div class="row">
    <div class="col-md-1">
      <div class="list-group">
        <?php foreach ($types as $type): ?>
        <a href="<?php echo site_url("division/$id/$type->documenttype") ?>" class="list-group-item <?php echo $active_type == $type->documenttype ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="<?=$type->documentdesc?>"><?=$type->documenttype?></a>
        <?php endforeach; ?>
        <a href="<?php echo site_url("division/$id") ?>" class="list-group-item <?php echo $active_type == 'ALL' ? 'active' : '' ?>">ALL</a>
      </div>  
    </div>
    <div class="col-md-11">
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
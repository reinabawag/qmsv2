<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Update Document Info
	</h3>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php if (isset($_SESSION['msg'])): ?>
						<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
					<?php endif; ?>
					<?php echo form_open_multipart(); ?>
						<div class="form-group">
							<label for="docnum">Document Number</label>
							<?=form_input('docnum', set_value('docnum', $masterlist->docnum), ['class' => 'form-control', 'id' => 'docnum', 'placeholder' => 'Enter document number'])?>
						</div>
						<div class="form-group">
							<label for="documenttitle">Document Title</label>
							<?=form_input('documenttitle', set_value('documenttitle', $masterlist->documenttitle), ['class' => 'form-control', 'id' => 'documenttitle', 'placeholder' => 'Enter document title'])?>
						</div>
						<div class="form-group">
							<label for="documenttype">Document Type</label>
							<?=form_dropdown('documenttype', $documenttype, set_value('documenttype', $masterlist->documenttype), ['class' => 'form-control', 'id' => 'documenttype'])?>
						</div>
						<div class="form-group">
							<label for="division">Division</label>
							<?=form_dropdown('division', $division, set_value('division', $masterlist->division), ['class' => 'form-control', 'id' => 'division'])?>
						</div>
						<div class="form-group">
							<label for="department">Department</label>
							<?=form_dropdown('department', $department, set_value('department', $masterlist->department), ['class' => 'form-control', 'id' => 'department'])?>
						</div>
						<div class="form-group">
							<label for="date">Effective Date</label>
							<input type="input"  data-provide="datepicker" name="effectivitydate" class="form-control" id="date" value="<?=set_value('date', date('m/d/Y', strtotime($masterlist->effectivitydate)))?>">
						</div>
						<div class="form-group">
							<label for="status">Document Status</label>
							<?=form_dropdown('status', $status, set_value('status', $masterlist->status), ['class' => 'form-control', 'id' => 'status'])?>
						</div>
						<div class="form-group">
							<label for="status">Filename</label>
							<input type="text" class="form-control" value="<?=$masterlist->filename?>" disabled>
						</div>
						<?php if($masterlist->filename == ''): ?>
						<div class="form-group">
							<label for="file">Upload Document</label>
							<?=form_upload('file')?>
						</div>
						<?php endif; ?>
						<?php echo validation_errors(); ?>
						<?php echo $error; ?>
						<?php if($masterlist->filename != ''): ?>
						<a href="<?=site_url('admin/remove/file/'.$masterlist->procedureid)?>" class="btn btn-warning btn-sm btn-block">Remove uploaded file</a>
						<?php endif; ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<a class="btn btn-danger btn-sm btn-block" onclick="deleteDocument(<?=$masterlist->procedureid?>)"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete Document</a>
					</form>
				</div>
			</div>
		</div>
	</div>
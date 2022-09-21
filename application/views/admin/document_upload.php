<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Upload Document
	</h3>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open_multipart(); ?>
						<div class="form-group">
							<label for="docnum">Document Number</label>
							<?=form_input('docnum', set_value('docnum'), ['class' => 'form-control', 'id' => 'docnum', 'placeholder' => 'Enter document number'])?>
						</div>
						<div class="form-group">
							<label for="documenttitle">Document Title</label>
							<?=form_input('documenttitle', set_value('documenttitle'), ['class' => 'form-control', 'id' => 'documenttitle', 'placeholder' => 'Enter document title'])?>
						</div>
						<div class="form-group">
							<label for="documenttype">Document Type</label>
							<?=form_dropdown('documenttype', $documenttype, set_value('documenttype'), ['class' => 'form-control', 'id' => 'documenttype'])?>
						</div>
						<div class="form-group">
							<label for="division">Division</label>
							<?=form_dropdown('division', $division, set_value('division'), ['class' => 'form-control', 'id' => 'division'])?>
						</div>
						<div class="form-group">
							<label for="department">Department</label>
							<?=form_dropdown('department', $department, set_value('department'), ['class' => 'form-control', 'id' => 'department'])?>
						</div>
						<div class="form-group">
							<label for="date">Effective Date</label>
							<input type="input" name="date" class="form-control" id="date" value="<?=set_value('date', date('m/d/Y'))?>">
						</div>
						<div class="form-group">
							<label for="status">Document Status</label>
							<?=form_dropdown('status', $status, set_value('status'), ['class' => 'form-control', 'id' => 'status'])?>
						</div>
						<div class="form-group">
							<label for="file">Upload Document</label>
							<?=form_upload('file', set_value('file'))?>
						</div>
						<?php echo validation_errors(); ?>
						<?php echo $error; ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<input type="reset" class="btn btn-default btn-sm btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
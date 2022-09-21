<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Add New Document Level
	</h3>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="level">Document Level</label>
							<?=form_dropdown('level', $level, set_value('level'), ['class' => 'form-control', 'id' => 'level'])?>
							<!-- <select name="level" id="level" class="form-control">	
								<option value="Level 1">Level 1</option>
								<option value="Level 2">Level 2</option>
								<option value="Level 3">Level 3</option>
								<option value="Level 4">Level 4</option>
							</select> -->
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<?php echo form_input('documentdesc', set_value('documentdesc'), ['class' => 'form-control', 'placeholder' => 'Enter document description']); ?>
						</div>
						<div class="form-group">
							<label for="">Type</label>
							<?php echo form_input('documenttype', set_value('documenttype'), ['class' => 'form-control', 'placeholder' => 'Enter document type']); ?>
						</div>
						<?php echo validation_errors(); ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<input type="reset" class="btn btn-default btn-sm btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
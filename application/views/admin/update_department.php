<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Update Department
	</h3>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="description">Description</label>
							<?php echo form_input('description', is_null(set_value('description')) ? set_value('description') : $department->dept_name, ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<?php echo validation_errors(); ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<input type="reset" class="btn btn-default btn-sm btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
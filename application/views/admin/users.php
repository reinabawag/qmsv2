<<<<<<< HEAD
<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Manage User
	</h3>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="description">Last name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">First name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Middle name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Username</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Password</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Confirm Password</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<?php echo validation_errors(); ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<input type="reset" class="btn btn-default btn-sm btn-block">
					</form>
				</div>
			</div>
		</div>
=======
<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Manage User
	</h3>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="description">Last name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">First name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Middle name</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Username</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Password</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<div class="form-group">
							<label for="description">Confirm Password</label>
							<?php echo form_input('description', set_value('description'), ['class' => 'form-control', 'placeholder' => 'Enter Department Name']); ?>
						</div>
						<?php echo validation_errors(); ?>
						<input type="submit" class="btn btn-primary btn-sm btn-block">
						<input type="reset" class="btn btn-default btn-sm btn-block">
					</form>
				</div>
			</div>
		</div>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
	</div>
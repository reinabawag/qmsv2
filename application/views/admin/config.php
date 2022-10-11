<<<<<<< HEAD
<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Configuration
	</h3>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="mission">Mission</label>
							<?php echo form_textarea('mission', set_value('mission', $info->mission), ['class' => 'form-control', 'placeholder' => '']); ?>
						</div>
						<div class="form-group">
							<label for="vission">Vission</label>
							<?php echo form_textarea('vission', set_value('vission', $info->vission), ['class' => 'form-control', 'placeholder' => '']); ?>
						</div>
						<div class="form-group">
							<label for="policy">Policy</label>
							<?php echo form_textarea('policy', set_value('policy', entity_decode($info->policy)), ['class' => 'form-control', 'placeholder' => '']); ?>
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
		Configuration
	</h3>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo form_open(); ?>
						<div class="form-group">
							<label for="mission">Mission</label>
							<?php echo form_textarea('mission', set_value('mission', $info->mission), ['class' => 'form-control', 'placeholder' => '']); ?>
						</div>
						<div class="form-group">
							<label for="vission">Vission</label>
							<?php echo form_textarea('vission', set_value('vission', $info->vission), ['class' => 'form-control', 'placeholder' => '']); ?>
						</div>
						<div class="form-group">
							<label for="policy">Policy</label>
							<?php echo form_textarea('policy', set_value('policy', entity_decode($info->policy)), ['class' => 'form-control', 'placeholder' => '']); ?>
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
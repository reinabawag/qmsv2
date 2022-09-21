<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Manage Department
	</h3>
	<a href="<?php echo site_url('department/create'); ?>">Create New Department</a><br><br>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
	<?php endif; ?>
	<table class="table table-striped table-bordered" id="table">
		<thead>
			<tr>
				<th>Description</th>
				<th>Options</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($departments as $department): ?>
			<tr>
				<td><?=$department->dept_name?></td>
				<td><a href="<?=site_url("department/update/$department->deptid")?>">Update</a> | <a href="<?=site_url("department/remove/$department->deptid")?>">Remove</a></td>
				<td><?=$department->visible == TRUE ? 'Active' : 'Inactive' ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<<<<<<< HEAD
<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Manage Document Level
	</h3>
	<a href="<?php echo site_url('document/create'); ?>">Create New Document Level</a><br><br>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
	<?php endif; ?>
	<table class="table table-striped table-bordered" id="table">
		<thead>
			<tr>
				<th>Level</th>
				<th>Description</th>
				<th>Type</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td><?=$document->level?></td>
				<td><?=$document->documentdesc?></td>
				<td><?=$document->documenttype?></td>
				<td><a href="<?=site_url("document/update/$document->recid")?>">Update</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
=======
<div class="container">
	<h3 class="page-header">
		<!-- <a href="<?=$this->agent->referrer()?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-circle-arrow-left"></span></a> -->
		Manage Document Level
	</h3>
	<a href="<?php echo site_url('document/create'); ?>">Create New Document Level</a><br><br>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
	<?php endif; ?>
	<table class="table table-striped table-bordered" id="table">
		<thead>
			<tr>
				<th>Level</th>
				<th>Description</th>
				<th>Type</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td><?=$document->level?></td>
				<td><?=$document->documentdesc?></td>
				<td><?=$document->documenttype?></td>
				<td><a href="<?=site_url("document/update/$document->recid")?>">Update</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854

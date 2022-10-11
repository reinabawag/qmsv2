<<<<<<< HEAD
<div class="container">
	<h3 class="page-header">Manage Documents</h3>
	<a href="<?php echo site_url('document/upload'); ?>">Upload New Document</a><br><br>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
	<?php endif; ?>
	<table class="table table-striped table-bordered" id="masterlist-table">
		<thead>
			<tr>
				<th>Document Number</th>
				<th>Document Title</th>
				<th>Document Type</th>
				<th>Division</th>
				<th>Department</th>
				<th>Effectivity</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td>
				<?php if(strlen($document->filename) == 0): ?>
					<?=$document->docnum?>
				<?php else: ?>
					<a href="<?=site_url('iso/document/'.$document->filename)?>" target="_blank"><?=$document->docnum?></a>
				<?php endif; ?>
				</td>
				<td><?=$document->documenttitle?></td>
				<td><?=$document->documentdesc?></td>
				<td><?=$document->div_name?></td>
				<td><?=$document->dept_name?></td>
				<td><?=date('F d, Y', strtotime($document->effectivitydate))?></td>
				<td><?=$document->status?></td>
				<td><a href="<?=site_url("admin/document/update/$document->procedureid")?>">Update</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
=======
<div class="container">
	<h3 class="page-header">Manage Documents</h3>
	<a href="<?php echo site_url('document/upload'); ?>">Upload New Document</a><br><br>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="alert alert-success" role="alert"><?=$_SESSION['msg']?></div>
	<?php endif; ?>
	<table class="table table-striped table-bordered" id="masterlist-table">
		<thead>
			<tr>
				<th>Document Number</th>
				<th>Document Title</th>
				<th>Document Type</th>
				<th>Division</th>
				<th>Department</th>
				<th>Effectivity</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td>
				<?php if(strlen($document->filename) == 0): ?>
					<?=$document->docnum?>
				<?php else: ?>
					<a href="<?=site_url('iso/document/'.$document->filename)?>" target="_blank"><?=$document->docnum?></a>
				<?php endif; ?>
				</td>
				<td><?=$document->documenttitle?></td>
				<td><?=$document->documentdesc?></td>
				<td><?=$document->div_name?></td>
				<td><?=$document->dept_name?></td>
				<td><?=date('F d, Y', strtotime($document->effectivitydate))?></td>
				<td><?=$document->status?></td>
				<td><a href="<?=site_url("admin/document/update/$document->procedureid")?>">Update</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
	</table>
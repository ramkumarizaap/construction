<?php
$filename = "Project Report ".date("Y-m-d").".xls";
header("Content-Type: application/force-download");
header("Content-type: application/excel");
header("Content-Disposition: inline; filename=\"".$filename."\";");
?>
<link rel="stylesheet" type="text/css" href="<?=base_path();?>assets/css/admin/bootstrap.min.css">
<?php 
if($projects)
{
	$i=1;
	?>
<table class="table table-hover table-bordered" border="1">
	<?php 
	foreach ($projects as $key => $value)
	{
		?>
		<tr>
			<thead>
				<th colspan="6" class="text-center" style="background-color: #faa;">#<?=$i." ".$value['project_name'];?></th>
			</thead>
		</tr>
		<tr>
			<thead>
				<th>Address</th><th>Start Date</th><th>Complete Date</th><th>Manager</th><th>Superintendent</th><th class="text-center">Status</th>
			</thead>
		</tr>
		<tbody>
			<tr>
				<td><?=$value['project_address1'];?></td>
				<td><?=displayData($value['start_date'],"date");?></td>
				<td><?=displayData($value['complete_date'],"date");?></td>
				<td><?=$value['manager'];?></td>
				<td><?=$value['super'];?></td>
				<td style="background-color: #5bc0de;" class="btn-info text-center"><b><?=$value['status'];?></b></td>
			</tr>
			<tr>
				<td colspan="6" class="text-center" style="background-color: #ccc;"><b>Test - Milestones</b></td>
			</tr>
			<?php
				$milestones = get_project_milestones($value['id']);
				if($milestones)
				{
					?>
						<tr>
							<td colspan="6" style="padding: 0;">
								<table class="table table-bordered table-hover" style="margin: 0;" border="1">
									<thead>
										<th>Name</th><th>Start Date</th><th>End Date</th><th>Work Items</th><th>Contractor</th>
										<th class="text-center">Status</th>
									</thead>
									<tbody>
										<?php
										foreach ($milestones as $ms)
										{
											?>
												<tr>
													<td><?=$ms['name'];?></td>
													<td><?=displayData($ms['start_date'],"date");?></td>
													<td><?=displayData($ms['end_date'],"date");?></td>
													<td><?=$ms['works'];?></td>
													<td><?=$ms['contractor'];?></td>
													<td style="background-color: #d9534f;" class="btn-danger text-center"><b><?=$ms['status'];?></b></td>
												</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</td>
						</tr>
						<?php
					}
					?>
			<?php
			$i++;
		}
		?>
	</tbody>
</table>
<?php 
}
?>

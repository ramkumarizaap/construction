<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Add Work
			</h3>
			<div class="page-bar">
				 <?php echo set_breadcrumb(); ?>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table"></i> Work Form
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="">
								<div class="form-body">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Work Name</label>
										<div class="col-md-5 <?=(form_error('work_name'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Work Name" name="work_name"
											 value="<?php echo set_value('work_name',$editdata['work_name']);?>">
											<?=form_error('work_name');?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Active	</label>
										<div class="col-md-5">
											<label class="radio-inline"><input type="radio" value="Y" name="enabled" <?php echo set_radio('enabled', 'Y', ($editdata['active']=='Y')?TRUE:FALSE);?> >Yes</label>
											<label class="radio-inline"><input type="radio" value="N" name="enabled" <?php echo set_radio('enabled', 'N', ($editdata['active']=='N')?TRUE:FALSE);?> >No</label>
										</div>
									</div>
									
								</div>

								<input type="hidden" name="edit_id" class="form-control" id="edit_id" value="<?php echo $editdata['id'];?>">

								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<a href="<?=site_url('customer');?>" class="btn default">Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>



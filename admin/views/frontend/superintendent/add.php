<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		 Add Superintendant
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
							<i class="fa fa-table"></i> Superintendant Form
						</div>
					</div>
					<div class="portlet-body form">
						<form class="form-horizontal" role="form" method="post" action="">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-3 control-label">First Name <span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('first_name'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="First Name" name="first_name"
										 value="<?php echo set_value('first_name',$editdata['first_name']);?>">
										<?=form_error('first_name');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('last_name'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Last Name" name="last_name"
										 value="<?php echo set_value('last_name',$editdata['last_name']);?>">
										<?=form_error('last_name');?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Primary Email <span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('email'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Primary Email" name="email"
										 value="<?php echo set_value('email',$editdata['email']);?>">
										<?=form_error('email');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Office Phone <span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('phone'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Phone" name="phone"
										 value="<?php echo set_value('phone',$editdata['phone']);?>">
										<?=form_error('phone');?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Address 1 <span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('address1'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Address 1" name="address1" value="<?php echo set_value('address1',$editdata['address1']);?>">
										<?=form_error('address1');?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Address 2</label>
									<div class="col-md-5 <?=(form_error('address2'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Address 2" name="address2"
										 value="<?php echo set_value('address2',$editdata['address2']);?>">
										<?=form_error('address2');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">City<span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('city'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="City" name="city"
										 value="<?php echo set_value('city',$editdata['city']);?>">
										<?=form_error('city');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">State<span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('state'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="State" name="state"
										 value="<?php echo set_value('state',$editdata['state']);?>">
										<?=form_error('state');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Zipcode<span class="required">*</span></label>
									<div class="col-md-5 <?=(form_error('zipcode'))?'has-error':'';?>">
										<input type="text" class="form-control" placeholder="Zipcode" name="zipcode"
										 value="<?php echo set_value('zipcode',$editdata['zip']);?>">
										<?=form_error('zipcode');?>
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
										<a href="<?=site_url('superintendant');?>" class="btn default">Cancel</a>
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
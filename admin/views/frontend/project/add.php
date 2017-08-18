
<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Add Project
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
								<i class="fa fa-table"></i> Add Project Form
							</div>
						</div>
						 <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post">
                           <div class="form-body">
                              <h3 class="form-section"><strong>Primary Contact Address</strong></h3>
                              
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('first_name'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">First Name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo set_value('first_name',$editdata['first_name']);?>">
                                          <?php echo form_error("first_name"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('last_name'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Last Name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$editdata['last_name']);?>">
                                        <?php echo form_error("last_name"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('email'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Email<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email',$editdata['email']);?>">
                                          <?php echo form_error("email"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('phone'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Phone<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo set_value('phone',$editdata['phone']);?>">
                                        <?php echo form_error("phone"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('addr'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Address<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="addr" id="addr" placeholder="Address"><?php echo set_value('addr',$editdata['addr']);?></textarea>
                                          <?php echo form_error("addr"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('city'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">City<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo set_value('city',$editdata['city']);?>">
                                        <?php echo form_error("city"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('state'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">State<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <select class="form-control" name="state" id="state">
                                         <?php if(is_array($state) && count($state)): 
                                            foreach($state as $key3=>$value3):
                                         ?>
                                             <option value="<?php echo $value3['state_code']; ?>"><?php echo $value3['state_name']; ?></option>
                                          <?php endforeach;endif; ?>
                                          </select>
                                          <?php echo form_error("state"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('country'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Country<span class="required">*</span></label>
                                       <div class="col-md-9">
                                        <select class="form-control" name="country" id="country">
                                            <?php if(is_array($country) && count($country)): 
                                            foreach($country as $key4=>$value4):
                                         ?>
                                             <option value="<?php echo $value4['code']; ?>"><?php echo $value4['name']; ?></option>
                                          <?php endforeach;endif; ?>
                                          </select>
                                        <?php echo form_error("country"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('zip_code'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Zipcode<span class="required">*</span></label>
                                       <div class="col-md-9">
                                           <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Zipcode" value="<?php echo set_value('zip_code',$editdata['zip_code']);?>">
                                          <?php echo form_error("zip_code"); ?>
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>
                              <!--/row-->
                              
                              <h3 class="form-section"><strong>Secondary Contact Address</strong></h3>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">First Name</label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="se_first_name" id="se_first_name" placeholder="First Name" value="<?php echo set_value('se_first_name',$editdata['se_first_name']);?>">
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Last Name</label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="se_last_name" id="se_last_name" placeholder="Last Name" value="<?php echo set_value('se_last_name',$editdata['se_last_name']);?>">
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('se_email'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Email</label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="se_email" id="se_email" placeholder="Email" value="<?php echo set_value('email',$editdata['email']);?>">
                                          <?php echo form_error("se_email"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('se_phone'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Phone</label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="se_phone" id="se_phone" placeholder="Phone" value="<?php echo set_value('se_phone',$editdata['se_phone']);?>">
                                        <?php echo form_error("se_phone"); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Address</label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="se_addr" id="se_addr" placeholder="Address"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">City</label>
                                       <div class="col-md-9">
                                        <input type="text" class="form-control" name="se_city" id="se_city" placeholder="City" value="<?php echo set_value('se_city',$editdata['se_city']);?>">
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">State</label>
                                       <div class="col-md-9">
                                        <select class="form-control" name="se_state" id="se_state">
                                            <?php if(is_array($state) && count($state)): 
                                            foreach($state as $key3=>$value3):
                                         ?>
                                             <option value="<?php echo $value3['state_code']; ?>"><?php echo $value3['state_name']; ?></option>
                                          <?php endforeach;endif; ?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Country</label>
                                       <div class="col-md-9">
                                        <select class="form-control" name="se_country" id="se_country">
                                             <?php if(is_array($country) && count($country)): 
                                            foreach($country as $key4=>$value4):
                                         ?>
                                             <option value="<?php echo $value4['code']; ?>"><?php echo $value4['name']; ?></option>
                                          <?php endforeach;endif; ?>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Zipcode</label>
                                       <div class="col-md-9">
                                           <input type="text" class="form-control" name="se_zip_code" id="se_zip_code" placeholder="Zipcode" value="<?php echo set_value('se_zip_code',$editdata['se_zip_code']);?>">
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>

                              <!--/row-->
                              <h3 class="form-section"><strong>Assign Contractor</strong></h3>

                              <div>
                                 <div>
                                    <div class="mt-repeater-input mt-checkbox-inline">
                                         <label class="control-label">Contractor<span class="required">*</span></label>
                                         <br>

                                         <?php if(is_array($contractor_info) && count($contractor_info)): 
                                            foreach($contractor_info as $key=>$value):
                                         ?>
                                         <label class="mt-checkbox">
                                             <input type="checkbox" name="a_c[]" id="inlineCheckbox<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" data-contractor="<?php echo $value['company_name']; ?>"> <?php echo $value['company_name']; ?>
                                             <span></span>
                                         </label>
                                        <?php endforeach; endif; ?>
                                        <?php echo form_error('a_c'); ?>
                                     </div>
                                 </div>
                              </div>

                              <!--/row-->
                              <h3 class="form-section"><strong>Project Details</strong> </h3>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_name'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Project Name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="p_name" id="p_name" value="<?php echo set_value('p_name',$editdata['p_name']);?>"> 
                                          <?php echo form_error('p_name'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_s_d'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Project Start Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control form-control-inline date date-picker" name="p_s_d" id="p_s_d" value="<?php echo set_value('p_s_d',$editdata['p_s_d']);?>"> 
                                          <?php echo form_error('p_s_d'); ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_e_d'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Project End Date<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control form-control-inline date date-picker" name="p_e_d" id="p_e_d" value="<?php echo set_value('p_e_d',$editdata['p_e_d']);?>"> 
                                          <?php echo form_error('p_e_d'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Project Blue Print</label>
                                       <div class="col-md-9">
                                          <input type="file" class="form-control" name="p_b_f" id="p_b_f">
                                          <?php echo form_error('p_b_f'); ?> 
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                
                              </div>
                              
                              <!--/row-->
                              <h3 class="form-section"><strong>Project Location</strong></h3>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_addr1'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Address 1<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="p_addr1" id="p_addr1"></textarea>
                                          <?php echo form_error('p_addr1'); ?> 
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Address 2</label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="p_addr2" id="p_addr2"></textarea> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_city'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">City<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="p_city" id="p_city" value="<?php echo set_value('p_city',$editdata['p_city']);?>"> 
                                          <?php echo form_error('p_city'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_state'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">State<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" name="p_state" id="p_state">
                                            <?php if(is_array($state) && count($state)): 
                                            foreach($state as $key5=>$value5):
                                         ?>
                                             <option value="<?php echo $value5['state_code']; ?>"><?php echo $value5['state_name']; ?></option>
                                          <?php endforeach;endif; ?>
                                          </select> 
                                          <?php echo form_error('p_state'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_zip_code'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Zipcode<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" name="p_zip_code" id="p_zip_code" value="<?php echo set_value('p_zip_code',$editdata['p_zip_code']);?>">
                                          <?php echo form_error('p_zip_code'); ?> 
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>                                                     
                           </div>

                           <h3 class="form-section" style="margin-left:20px;"><strong>Room Number</strong></h3>
                          
                                     <!--<a href="javascript:;" style="margin-left:20px;" data-repeater-create class="btn btn-success mt-repeater-add">
                                       <i class="fa fa-plus"></i> Add More Items</a><br><br>-->

                                       <div style="margin-left:20px;">

                                          <div class="mt-repeater-item">
                                             <!-- jQuery Repeater Container -->
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Room Name</label>
                                                <br/>
                                                <input class="input-group form-control" size="16" type="text"  name="r_name[]"/> 
                                           
                                             </div>
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Room Number</label>
                                                <br/>
                                                <input class="input-group form-control" size="16" type="text"  name="r_no[]"/> 

                                             </div>
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Room Description</label>
                                                <br/>
                                                <textarea class="form-control" name="r_desc[]" id="r_desc[]"/></textarea> 
                                             </div>
                                            
                                             <!--<div class="mt-repeater-input">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                <i class="fa fa-close"></i> Delete</a>
                                             </div>-->
                                          </div>
                                          
                                          
                                       </div>

                           
                                    <h3 class="form-section" style="margin-left:20px;"><strong>Project Milestone</strong></h3>
                          
                                     <a href="javascript:;" style="margin-left:20px;" data-repeater-create class="btn btn-success mt-repeater-add">
                                       <i class="fa fa-plus"></i> Add More Items</a><br><br>

                                       <div data-repeater-list="" style="margin-left:20px;">

                                          <div data-repeater-item class="mt-repeater-item">
                                             <!-- jQuery Repeater Container -->
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Milestone Name</label>
                                                <br/>
                                                <select name="m_name[]" id="m_name" multiple class="form-control">

                                                 <?php if(is_array($work_items) && count($work_items)): 
                                                     foreach($work_items as $key2=>$value2):
                                                 ?>
                                                   <option value="<?php echo $value2['id']; ?>"><?php echo $value2['work_name']; ?></option>
                                                <?php endforeach;endif; ?>   
                                                </select>                                             
                                             </div>
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Contractor</label>
                                                <br/>
                                                <select name="m_cnt[]" id="m_cnt" class="form-control">
                                                   
                                                </select>
                                             </div>
                                             <div class="mt-repeater-input">
                                                <label class="control-label">Start Date</label>
                                                <br/>
                                                <input class="input-group form-control form-control-inline date date-picker" size="16" type="text"  name="m_s_d[]" data-date-format="dd/mm/yyyy" /> 
                                             </div>
                                             <div class="mt-repeater-input">
                                                <label class="control-label">End Date</label>
                                                <br/>
                                                <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" name="m_e_d[]" data-date-format="dd/mm/yyyy" /> 
                                             </div>
                                            
                                             <div class="mt-repeater-input mt-repeater-textarea">
                                                <label class="control-label">Milestone Description</label>
                                                <br/>
                                                <textarea name="m_desc[]" id="m_desc" class="form-control" rows="3"></textarea>
                                             </div>
                                             <div class="mt-repeater-input">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                <i class="fa fa-close"></i> Delete</a>
                                             </div>
                                          </div>

                                         
                                       </div>

                                       <div class="form-actions">
         											<div class="row">
         												<div class="col-md-offset-3 col-md-9">
         													<button type="submit" class="btn green">Submit</button>
         													<a href="<?php echo site_url('project');?>" class="btn default">Cancel</a>
         												</div>
         											</div>
         										</div>

                        </form>
                        <!-- BEGIN PAGE TITLE-->
                       
                     </div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>



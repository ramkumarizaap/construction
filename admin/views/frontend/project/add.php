<?php

//echo "<pre>";print_r(form_error());die;
//echo "<pre>";print_r($editdata);die;
?>
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
                        <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post" enctype="multipart/form-data">
                           <div class="form-body">

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
                                    <div class="form-group <?php echo (form_error('p_b_f'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Project Blue Print</label>
                                       <div class="col-md-9">
                                          <input type="file" class="form-control" name="p_b_f" id="p_b_f">
                                          <?php echo form_error('p_b_f'); ?> 
                                       </div>
                                       <?php 
                                       if($editdata['p_b_f']!=''){?>
                                       <br><br>
                                       <div class="col-md-9">
                                        <img src="<?=base_url()."../".$editdata['p_b_f'];?>" style="height: 100px;width: 150px;">
                                        <input type="hidden" name="blue_print" value="<?=$editdata['p_b_f'];?>">
                                       </div>
                                       <?php }?>
                                    </div>
                                 </div>
                                 <!--/span-->
                                
                              </div>
                              <div class="row">
                                <?php if($this->user['role']!="2"){?>
                                <div class="col-md-6">
                                  <div class="form-group <?php echo (form_error('manager'))?'has-error':'';?>">
                                     <label class="control-label col-md-3">Project Manager<span class="required">*</span></label>
                                     <div class="col-md-9">
                                        <?php echo form_dropdown('manager', array('' => '-None-')+get_user_by_role(2), set_value('manager', $editdata['manager']), 'class="form-control width_select"');?>
                                        <?php echo form_error('manager'); ?>
                                     </div>
                                  </div>
                                </div>
                                <?php 
                              }else{?>
                              <input type="hidden" class="form-control form-control-inline" name="manager" id="manager" value="<?=$this->user['id'];?>"> 
                              <?php }?>
                                <div class="col-md-6">
                                  <div class="form-group <?php echo (form_error('superintendent'))?'has-error':'';?>">
                                     <label class="control-label col-md-3">Superintendent</label>
                                     <div class="col-md-9">
                                        <?php echo form_dropdown('superintendent', array('' => '-None-')+get_user_by_role(3), set_value('superintendent', $editdata['superintendent']), 'class="form-control width_select"');?>
                                        <?php echo form_error("superintendent"); ?>
                                     </div>
                                  </div>
                                </div>
                              </div>
                              <h3 class="form-section"><strong>Primary Contact Address</strong></h3>
                              <input type="hidden" name="client_id1" value="<?=$editdata['client_id1'];?>">
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
                                             <option value="<?php echo $value3['state_code']; ?>" <?php echo (isset($editdata['state']) && $editdata['state']==$value3['state_code'])?"selected":''; ?> ><?php echo $value3['state_name']; ?></option>
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
                                             <option value="<?php echo $value4['code']; ?>" <?php echo (isset($editdata['country']) && $editdata['country']==$value4['code'])?"selected":''; ?>><?php echo $value4['name']; ?></option>
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
                              <input type="hidden" name="client_id2" value="<?=$editdata['client_id2'];?>">
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
                                          <textarea class="form-control" name="se_addr" id="se_addr" placeholder="Address"><?php echo set_value('se_addr',$editdata['se_addr']);?></textarea>
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
                                             <option value="<?php echo $value3['state_code']; ?>" <?php echo (isset($editdata['se_state']) && $editdata['se_state']==$value3['state_code'])?"selected":''; ?>><?php echo $value3['state_name']; ?></option>
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
                                             <option value="<?php echo $value4['code']; ?>" <?php echo (isset($editdata['se_country']) && $editdata['se_country']==$value4['code'])?"selected":''; ?>><?php echo $value4['name']; ?></option>
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
                              <!-- <input type="text" name="con_id" value="<?=isset($editdata['a_c'])?$editdata['a_c']:'';?>"> -->
                              <div>
                                 <div>
                                    <div class="mt-repeater-input mt-checkbox-inline <?php echo (form_error('a_c[]'))?'has-error':'';?>">
                                         <label class="control-label">Contractor<span class="required">*</span></label>
                                         <br>

                                         <?php 
                                          if(isset($editdata['a_c']) && is_array($editdata['a_c']))
                                            $editdata['a_c'] = isset($editdata['a_c'])?$editdata['a_c']:'';
                                          else
                                            $editdata['a_c'] = isset($editdata['a_c'])?explode(",",$editdata['a_c']):'';
                                            $is_cnt_list = (isset($editdata['a_c']) && is_array($editdata['a_c']))?$editdata['a_c']:array();
                                            
                                            if(is_array($contractor_info) && count($contractor_info)): 
                                            foreach($contractor_info as $key=>$value):
                                         ?>
                                         <label class="mt-checkbox">
                                             <input type="checkbox" name="a_c[]" id="inlineCheckbox<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" data-contractor="<?php echo $value['company_name']; ?>" <?php echo (in_array($value['id'],$is_cnt_list))?"checked":""; ?>> <?php echo $value['company_name']; ?>
                                             <input type="hidden" name="a_c_name[]" value="<?php echo $value['company_name']; ?>">
                                             <span></span>
                                         </label>
                                        <?php endforeach; endif; ?>
                                        <?php echo form_error('a_c[]'); ?>
                                     </div>
                                 </div>
                              </div>

                              <!--/row-->
                              <h3 class="form-section"><strong>Project Location</strong></h3>
                              <!--/row-->
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group <?php echo (form_error('p_addr1'))?'has-error':'';?>">
                                       <label class="control-label col-md-3">Address 1<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="p_addr1" id="p_addr1"><?php echo set_value('p_addr1',$editdata['p_addr1']);?></textarea>
                                          <?php echo form_error('p_addr1'); ?> 
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Address 2</label>
                                       <div class="col-md-9">
                                          <textarea class="form-control" name="p_addr2" id="p_addr2"><?php echo set_value('p_addr2',$editdata['p_addr2']);?></textarea> 
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
                                             <option value="<?php echo $value5['state_code']; ?>" <?php echo (isset($editdata['p_state']) && $editdata['p_state']==$value5['state_code'])?"selected":''; ?>><?php echo $value5['state_name']; ?></option>
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
                          
                           <a href="javascript:;" style="margin-left:20px;"  class="btn btn-success mt-repeater-add2">
                           <i class="fa fa-plus"></i> Add More Items</a><br><br>

                           <?php

                              if(isset($editdata['r_name']))
                              {
                                $r_id = (isset($editdata['r_id']) && is_array($editdata['r_id']))?$editdata['r_id'][0]:'';
                                $r_name = (isset($editdata['r_name']) && is_array($editdata['r_name']))?$editdata['r_name'][0]:'';
                                $r_no = (isset($editdata['r_no']) && is_array($editdata['r_no']))?$editdata['r_no'][0]:'';
                                $r_desc2 = (isset($editdata['r_desc_dtl']) && is_array($editdata['r_desc_dtl']))?$editdata['r_desc_dtl'][0]:'';
                              }
                              else
                              {
                                $r_id = "";$r_name = "";$r_no = "";$r_desc2 = "";
                              }          
                           ?>

                           <div style="margin-left:20px;">
                              <input type="hidden"  name="r_id[]" value="<?php echo $r_id; ?>"/>
                              <div data-repeater-item class="mt-repeater-item mt-repeater-cust-item">
                                 <!-- jQuery Repeater Container -->
                                 <div class="mt-repeater-input <?php echo (form_error('r_name[0]'))?'has-error':'';  ?>">
                                    <label class="control-label">Room Name</label>
                                    <br/>
                                    <input class="input-group form-control" size="16" type="text"  name="r_name[]" value="<?php echo $r_name; ?>"/>
                                   <?php echo (form_error('r_name[0]'))?form_error('r_name[0]'):'';  ?>
                                 </div>
                                 <div class="mt-repeater-input <?php echo (form_error('r_no[0]'))?'has-error':'';  ?>">
                                    <label class="control-label">Room Number</label>
                                    <br/>
                                    
                                    <input class="input-group form-control" size="16" type="text"  name="r_no[]" value="<?php echo $r_no; ?>"/>

                                    <?php echo (form_error('r_no[0]'))?form_error('r_no[0]'):'';  ?>

                                 </div>
                                 <div class="mt-repeater-input">
                                    <label class="control-label">Room Description</label>
                                    <br/>
                                 <textarea class="form-control" name="r_desc_dtl[]" id="r_desc_dtl"/><?php echo $r_desc2; ?></textarea> 
                                 </div>
                                
                                 <div class="mt-repeater-input">
                                    <a href="javascript:;" data-id="<?=$r_id;?>" data-table="rooms" data-repeater-delete2 class="btn btn-danger mt-repeater-delete">
                                    <i class="fa fa-close"></i> Delete</a>
                                 </div>
                              </div>

                              <div class="mt-repeater-room-dtl">

                               <?php $k=1;if(isset($editdata['r_name'][$k]) && count($editdata['r_name'])>0): 

                                      $room_arr_ele = array_shift($editdata['r_name']); 
                                      
                                      foreach($editdata['r_name'] as $key=>$value):
                                 ?>
                               <input type="hidden"  name="r_id[]" value="<?=isset($editdata['r_id'][$k])?$editdata['r_id'][$k]:''; ?>"/>
                                <div data-repeater-item class="mt-repeater-item mt-repeater-cust-item">
                                 <!-- jQuery Repeater Container -->
                                 <div class="mt-repeater-input <?php echo (form_error('r_name['.$k.']'))?'has-error':'';  ?>">
                                    <label class="control-label">Room Name</label>
                                    <br/>
                                    <input class="input-group form-control" size="16" type="text"  name="r_name[]" value="<?php echo $value; ?>"/> 
                                    <?php echo (form_error('r_name['.$k.']'))?form_error('r_name['.$k.']'):'';  ?>
                                 </div>

                                 <div class="mt-repeater-input <?php echo (form_error('r_no['.$k.']'))?'has-error':'';  ?>">
                                    <label class="control-label">Room Number</label>
                                    <br/>
                                    
                                    <input class="input-group form-control" size="16" type="text"  name="r_no[]" value="<?php echo $editdata['r_no'][$k]; ?>"/>

                                    <?php echo (form_error('r_no['.$k.']'))?form_error('r_no['.$k.']'):'';  ?>
                                 </div>
                                 
                                 <div class="mt-repeater-input">
                                    <label class="control-label">Room Description</label>
                                    <br/>
                                 <textarea class="form-control" name="r_desc_dtl[]" id="r_desc_dtl"/><?php echo $editdata['r_desc_dtl'][$k]; ?></textarea> 
                                 </div>
                                 <div class="mt-repeater-input">
                                    <a href="javascript:;" data-id="<?=isset($editdata['r_id'][$k])?$editdata['r_id'][$k]:''; ?>" data-repeater-delete2 data-table="rooms" class="btn btn-danger mt-repeater-delete">
                                    <i class="fa fa-close"></i> Delete</a>
                                 </div>

                                </div>  
                              <?php $k++;endforeach;endif; ?>
                               
                              </div>
                           </div>

                           
                           <h3 class="form-section" style="margin-left:20px;"><strong>Project Items</strong></h3>
                 
                            <a href="javascript:;" style="margin-left:20px;" data-repeater-create class="btn btn-success mt-repeater-add">
                              <i class="fa fa-plus"></i> Add Items</a><br><br>

                              <?php

                                if(isset($editdata['group-a']))
                                {
                                   $m_arr = $editdata['group-a'];
                                   $m_id = isset($m_arr[0]['m_id'])?$m_arr[0]["m_id"]:'';
                                   $m_name = isset($m_arr[0]['m_name'])?$m_arr[0]["m_name"]:'';

                                   $m_desc = isset($m_arr[0]['m_desc'])?$m_arr[0]["m_desc"]:'';

                                   $m_s_d = isset($m_arr[0]['m_s_d'])?$m_arr[0]["m_s_d"]:'';
                                   
                                   $m_e_d = isset($m_arr[0]['m_e_d'])?$m_arr[0]["m_e_d"]:'';
                                }
                                else
                                {
                                 $m_arr = array();
                                 $m_name=$m_desc=$m_s_d=$m_e_d='';$m_id='';$m_cnt="";
                                } 
                                
                              ?>

                              <div data-repeater-list="group-a" style="margin-left:20px;">

                                 <div data-repeater-item class="mt-repeater-item">
                                    <!-- jQuery Repeater Container -->
                                   <input type="hidden" name="m_id" id="m_id" class="form-control" value="<?php echo set_value('m_id',$m_id);?>">
                                    <div class="mt-repeater-input mt-repeater-input <?php echo (form_error('group-a[0][m_name]') && $m_name=='')?'has-error':'';?>">
                                       <label class="control-label">Item Name</label>
                                       <br/>
                                       <input type="text" name="m_name" id="m_name" class="form-control" value="<?php echo set_value('m_name',$m_name);?>">
                                        <?php echo (form_error('group-a[0][m_name]') && $m_name=='')?form_error('group-a[0][m_name]'):'';  ?>
                                    </div>

                                    <div class="mt-repeater-input mt-repeater-textarea">
                                       <label class="control-label">Item Description</label>
                                       <br/>
                                       <textarea name="m_desc" id="m_desc" class="form-control" rows="2"><?php echo set_value('m_desc',$m_desc);?></textarea>
                                    </div>

                                    <div class="mt-repeater-input <?php echo (form_error('group-a[0][m_s_d]'))?'has-error':'';?>">
                                       <label class="control-label">Start Date</label>
                                       <br/>
                                       <input class="input-group form-control form-control-inline date date-picker" size="16" type="text"  name="m_s_d"  value="<?php echo set_value('m_name',$m_s_d);?>"/> 
                                       <?php echo (form_error('group-a[0][m_s_d]') )?form_error('group-a[0][m_s_d]'):'';  ?>
                                    </div>
                                    <div class="mt-repeater-input <?php echo (form_error('group-a[0][m_e_d]'))?'has-error':'';?>">
                                       <label class="control-label">End Date</label>
                                       <br/>
                                       <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" name="m_e_d" value="<?php echo set_value('m_e_d',$m_e_d);?>"/> 
                                        <?php echo (form_error('group-a[0][m_e_d]'))?form_error('group-a[0][m_e_d]'):'';  ?>
                                    </div>
                                     <div class="mt-repeater-input <?php echo (form_error('group-a[0][m_work_items]') && !isset($m_arr[0]['m_work_items']))?'has-error':'';?>">
                                       <label class="control-label">Work Items</label>
                                       <br/>
                                       <select name="m_work_items" id="m_work_items" multiple class="form-control">

                                        <?php if(is_array($work_items) && count($work_items)): 
                                            $selected='';

                                            foreach($work_items as $key2=>$value2):
                                             if(isset($editdata['group-a']))
                                             {
                                                $work_item = $editdata['group-a'][0]['m_work_items'];
                                                // $work_item= implode(',',$work_item);
                                                $final_work_item= explode(',',$work_item);
                                                $m_cnt = $m_arr[0]['m_cnt'];                                                
                                                $selected = (in_array($value2['id'],$final_work_item))?"selected='selected'":"";  
                                             }
                                        ?>
                                          <option value="<?php echo $value2['id']; ?>" <?php echo $selected; ?>><?php echo $value2['work_name']; ?></option>
                                       
                                       <?php endforeach;endif; ?>  
                                       
                                       </select>  

                                    <?php echo (form_error('group-a[0][m_work_items]') && !isset($work_item))?form_error('group-a[0][m_work_items]'):''; ?> 
                                 
                                    </div>

                                    <div class="mt-repeater-input <?php echo (form_error('group-a[0][m_cnt]') && $m_cnt=='')?'has-error':'';?>">
                                       <label class="control-label">Contractor</label>
                                       <br/>
                                       <select name="m_cnt" id="m_cnt" class="form-control contractor_select">
                                          <?php if(isset($contractor_info) && count($contractor_info) && is_array($contractor_info)):
                                              $a_c_name = isset($editdata['a_c_name'])?$editdata['a_c_name']:'';

                                              foreach($contractor_info as $key6=>$value6):

                                                $final_m_cnt= explode(',',$m_cnt);

                                                $selected = (in_array($value6,$final_m_cnt))?"selected='selected'":"";  

                                          ?>
                                           <option value="<?php echo $value6['id']; ?>" <?php echo $selected; ?>><?php echo $value6['company_name']; ?></option>
                                          <?php  endforeach;endif;
                                          ?>
                                       </select>
                                        <?php echo (form_error('group-a[0][m_cnt]') && $m_cnt=='')?form_error('group-a[0][m_cnt]'):'';?>
                                    </div>
                                    <div class="mt-repeater-input">
                                       <a href="javascript:;" data-id="<?=$m_id;?>" data-table="project_milestones" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                       <i class="fa fa-close"></i> Delete</a>
                                    </div>
                                 </div>

                                 <?php $i=1;$j=0;if(isset($editdata['group-a'][$i]) && count($editdata['group-a'])>0): 

                                       $ml_arr_ele = array_shift($editdata['group-a']); 

                                       foreach($editdata['group-a'] as $key=>$value):
                                 ?>

                                 <div data-repeater-item class="mt-repeater-item">
                                    <!-- jQuery Repeater Container -->
                                   <input type="hidden" name="m_id" id="m_id" class="form-control" value="<?php echo set_value('m_id',$value['m_id']);?>">
                                    <div class="mt-repeater-input mt-repeater-input <?php echo (form_error('group-a['.$i.'][m_name]') && $value['m_name']=='')?'has-error':'';?>">
                                       <label class="control-label">Milestone Name</label>
                                       <br/>
                                       <input type="text" name="m_name" id="m_name" class="form-control" value="<?php echo set_value('m_name',$value["m_name"]);?>">
                                        <?php echo (form_error('group-a['.$i.'][m_name]') && $value['m_name']=='')?form_error('group-a['.$i.'][m_name]'):'';?>
                                    </div>

                                    <div class="mt-repeater-input mt-repeater-textarea">
                                       <label class="control-label">Milestone Description</label>
                                       <br/>
                                       <textarea name="m_desc" id="m_desc" class="form-control" rows="2"><?php echo set_value('m_name',$value["m_desc"]);?></textarea>
                                    </div>

                                    <div class="mt-repeater-input <?php echo (form_error('group-a['.$i.'][m_s_d]'))?'has-error':'';?>">
                                       <label class="control-label">Start Date</label>
                                       <br/>
                                       <input class="input-group form-control form-control-inline date date-picker" size="16" type="text"  name="m_s_d"  value="<?php echo set_value('m_name',$value["m_s_d"]);?>"/> 
                                       <?php echo (form_error('group-a['.$i.'][m_s_d]') )?form_error('group-a['.$i.'][m_s_d]'):'';?>
                                    </div>

                                    <div class="mt-repeater-input <?php echo (form_error('group-a['.$i.'][m_e_d]'))?'has-error':'';?>">
                                       <label class="control-label">End Date</label>
                                       <br/>
                                       <input class="input-group form-control form-control-inline date date-picker" size="16" type="text" name="m_e_d"  value="<?php echo set_value('m_name',$value["m_e_d"]);?>"/> 
                                       <?php echo (form_error('group-a['.$i.'][m_e_d]') )?form_error('group-a['.$i.'][m_e_d]'):'';?>
                                    </div>
                                    <div class="mt-repeater-input <?php echo (form_error('group-a['.$i.'][m_work_items]') && !isset($value['m_work_items']))?'has-error':'';?>">
                                       <label class="control-label">Work Items</label>
                                       <br/>
                                       <select name="m_work_items" id="m_work_items" multiple class="form-control">

                                        <?php if(is_array($work_items) && count($work_items)):

                                             foreach($work_items as $key2=>$value2):
                                             
                                             $work_item2= $value['m_work_items'];
                                             
                                             $final_work_item2= explode(',',$work_item2);
                                             
                                             $selected = (in_array($value2['id'],$final_work_item2))?"selected='selected'":"";  
                                        ?>

                                          <option value="<?php echo $value2['id']; ?>" <?php echo $selected; ?>><?php echo $value2['work_name']; ?></option>
                                       
                                       <?php endforeach;endif; ?>  
                                       
                                       </select>   
                                       
                                       <?php echo (form_error('group-a['.$i.'][m_work_items]') && !isset($work_item2))?form_error('group-a['.$i.'][m_work_items]'):''; ?> 
                                 
                                    </div>

                                    <div class="mt-repeater-input <?php echo ((!isset($value['m_cnt']) || $value['m_cnt']==''))?'has-error':'';?>">
                                       <label class="control-label">Contractor</label>
                                       <br/>
                                       <select name="m_cnt" id="m_cnt" class="form-control contractor_select">
                                          <?php if(isset($contractor_info) && count($contractor_info) && is_array($contractor_info)):
                                              $a_c_name2 = isset($editdata['a_c_name'])?$editdata['a_c_name']:'';
                                              foreach($contractor_info as $key7=>$value7):

                                                $m_cnt2 = $value['m_cnt'];

                                                $final_m_cnt2= explode(',',$m_cnt2);
                                                
                                                $selected = (in_array($value7['id'],$final_m_cnt2))?"selected='selected'":"";  

                                          ?>
                                           <option value="<?php echo $value7['id']; ?>" <?php echo $selected; ?>><?php echo $value7['company_name']; ?></option>
                                          <?php  endforeach;endif;
                                          ?>
                                       </select>
                                        <?php echo ((!isset($value['m_cnt']) || $value['m_cnt']))?form_error('group-a['.$i.'][m_cnt]'):'';?> 
                                    </div>
                                   
                                    
                                    <div class="mt-repeater-input">
                                       <a href="javascript:;" data-id="<?=$value["m_id"];?>" data-table="project_milestones" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                       <i class="fa fa-close"></i> Delete</a>
                                    </div>
                                 </div>
                                 <?php ++$i; endforeach;endif; ?> 
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



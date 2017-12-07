<div class="col-md-12 table-sub-header text-right search-bar pull-left">
  <div class="row">
    <div class="div top-lisiting-search">
      <form method="post" id="simple_search_form">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Project Name</label>
                <div class="col-md-7">
                  <?php echo form_dropdown('project_name', array('' => '-None-')+get_search_bar_values("project",'project_name',''),'', 'class="form-control"');?>   
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Manager</label>
                <div class="col-md-7">
                  <?php echo form_dropdown('manager', array('' => '-None-')+get_search_bar_values("admin_users",'first_name',array("role"=>'2')),'', 'class="form-control"');?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Superintendent</label>
                <div class="col-md-7">
                  <?php echo form_dropdown('super', array('' => '-None-')+get_search_bar_values("admin_users",'first_name',array("role"=>'3')),'', 'class="form-control"');?>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div><br>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Contractor</label>
                <div class="col-md-7">
                  <?php echo form_dropdown('contractor', array('' => '-None-')+get_search_bar_values("contractor",'first_name',''),'', 'class="form-control"');?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Start Date</label>
                <div class="col-md-7">
                  <input type="text" class="form-control date date-picker" placeholder="Start Date" name="start_date" value="">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">End Date</label>
                <div class="col-md-7">
                  <input type="text" class="form-control date date-picker" placeholder="End Date" name="end_date" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div><br>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-5 control-label">Status</label>
                <div class="col-md-7">
                  <?php echo form_dropdown('status', array('' => '-None-','PENDING'=>'PENDING','COMPLETED'=>"COMPLETED","PROCESSING"=>"PROCESSING","HOLD"=>"HOLD","CANCELLED"=>"CANCELLED"),'', 'class="form-control"');?>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="clearfix"></div><br>
          <div class="row">
            <div class="col-md-offset-2 col-md-4">
              <button type="button" id="simple_search_button" class="pull-left btn btn-primary">Submit&nbsp;&nbsp;<i class="fa fa-search"></i></button>
              <a href="javascript:;" class="btn btn-warning pull-left clear-fil" onclick="$.fn.clear_advance_search();"><i class="fa fa-remove"></i> Clear Filter</a>
            </div>
            <div class="col-md-6">
              <a href="javascript:;" class="pull-right export-btn btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
            </div>
          </div>
        </div>
      </form>
      <div class="clearfix"></div><br>
      <div class="right-section">
        <div class="col-sm-4 entry-text pull-left text-left">
          <span class="col-sm-6 show-entry">Show entries:</span>
          <span class="col-sm-6">
            <?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'class="form-control input-sm"');?>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
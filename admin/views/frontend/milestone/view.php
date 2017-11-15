<div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
       Milestones Status List
      </h3>
      <div class="page-bar">
         <?php echo set_breadcrumb(); ?>
      </div>
      <div class="blue-mat"></div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <?php display_flashmsg($this->session->flashdata()); ?>
      
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-user"></i>Milestones Status List
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-2">
                      <a href="<?=site_url('milestone');?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                  </div><br><br><br>
                  <div class="col-md-12">
                    <div class="tableView">
                      <?php 
                      if($milestone)
                      {
                        ?>
                          <div id="data_table">
                        <div class="row">
                          <div class="col-md-3">
                              <label class="control-label">Project Name : <b><?=$milestone[0]['project_name'];?></b></label>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Milestone Name : <b><?=$milestone[0]['m_name'];?></b></label>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">Start Date : <b><?=$milestone[0]['start_date'];?></b></label>
                          </div>
                          <div class="col-md-3">
                              <label class="control-label">End Date : <b><?=$milestone[0]['end_date'];?></b></label>
                          </div>
                        </div><br>
                        <div class="row milestone-view">
                            <div class="col-md-12">
                              <div class="grid">
                                  <table width="100%">
                                    <tbody>
                                      <tr>
                                        <td align="center" width="10%"><b>Work Item</b></td>
                                        <td align="center" width="10%"><b>Room No</b></td>
                                        <td align="center" width="40%"><b>Description</b></td>
                                        <td align="center" width="30%"><b>Photos</b></td>
                                        <td align="center" width="10%"><b>Status</b></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3">&nbsp;</td>
                                      </tr>
                                        <?php
                                        if($milestone)
                                        {
                                          $i=1;
                                          foreach ($milestone as $key => $value)
                                          {
                                            $img = explode(",",$value['photos']);
                                            ?>
                                              <tr>
                                                <td align="center" width="10%"><?=$value['w_name'];?></td>
                                                <td align="center" width="10%"><?=$value['room_name'];?></td>
                                                <td align="center" width="40%"><?=$value['description'];?></td>
                                                <td align="center" width="30%">
                                                  <?php
                                                  if(count($img)>0)
                                                  {
                                                    $j = 0;
                                                    foreach ($img as $value1)
                                                    {
                                                    ?>
                                                      <a data-fancybox="gallery<?=$i;?>" href="<?=base_path()."milestone_status/".$value1;?>">
                                                        <img src="<?=base_path()."milestone_status/".$value1;?>" style="width:50px;height:40px;">
                                                      </a>
                                                     <?php
                                                    }
                                                  }?>
                                                </td>
                                                <td align="center" width="10%"><?=displayData($value['status'],"status");?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="3">&nbsp;</td>
                                              </tr>
                                            <?php
                                            $i++;
                                          }
                                        }
                                        else
                                        {
                                          ?>
                                          <tr>
                                            <td colspan="7" align="center">No Records Found.</td>
                                          </tr>
                                          <?php
                                        }
                                        ?>
                                      <tr>
                                        <td colspan="3">&nbsp;</td>
                                      </tr>
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                        </div>
                        <!-- <table class="table table-striped table-hover table-bordered" id="data_table">
                          <thead>
                            <th>SNO</th>
                            <th>Work Item</th>
                            <th>Room No</th>
                            <th>Description</th>
                            <th>Photos</th>
                            <th>Status</th>
                          </thead>
                          <tbody>
                            <?php
                            if($milestone)
                            {
                              $i=1;
                              foreach ($milestone as $key => $value)
                              {
                                $img = explode(",",$value['photos']);
                                ?>
                                  <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$value['w_name'];?></td>
                                    <td><?=$value['room_name'];?></td>
                                    <td><?=$value['description'];?></td>
                                    <td>
                                      <?php
                                      if(count($img)>0)
                                      {
                                        $j = 0;
                                        foreach ($img as $value1)
                                        {
                                          if($j==0)
                                          {
                                        ?>
                                          <a data-fancybox="gallery<?=$i;?>" href="<?=base_path()."milestone_status/".$value1;?>">
                                            <img src="<?=base_path()."milestone_status/".$value1;?>" style="width:50px;height:40px;">
                                          </a>
                                          <?php
                                          }
                                          else
                                          {
                                            ?>
                                              <a data-fancybox="gallery<?=$i;?>" href="<?=base_path()."milestone_status/".$value1;?>"></a>
                                            <?php
                                          }
                                          $j++;
                                        }
                                      }?>
                                    </td>
                                    <td><?=displayData($value['status'],"status");?></td>
                                  </tr>
                                <?php
                                $i++;
                              }
                            }
                            else
                            {
                              ?>
                              <tr>
                                <td colspan="7" align="center">No Records Found.</td>
                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                        </table> -->
                          </div>
                          <?php
                      }
                      else
                      {
                        echo "<h2 class='etxt-center'>No Records Found</h2>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
      <!-- END PAGE CONTENT -->
    </div>
  </div>
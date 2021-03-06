<?php if(get_current_user_id() === FALSE):?>

<header class="brdr_bot">
    <div class="container">
        <div class="row text-center">
            Login
        </div>
    </div>
</header>

<?php else:?>

<div class="page-container">
  <div class="page-header md-shadow-z-1-i navbar">
    <div class="page-header-inner">
      <!-- BEGIN LOGO -->
      <div class="page-logo">      
        <h3 style="color: white;margin-top: 10px;">daVinci - GC Punch List Manager</h3>    
        <div class="menu-toggler sidebar-toggler hide">
          <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
        </div>
      </div>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
      </a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
         
          <?php
            $profile = get_user_data();         
          ?>
          <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src=""/>
            <span class="username username-hide-on-mobile">
            Welcome <?=$profile['first_name'];?> </span>
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li>
                <a href="<?=site_url('login/logout');?>">
                <i class="icon-key"></i> Log Out </a>
              </li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
          <!-- BEGIN QUICK SIDEBAR TOGGLER -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-quick-sidebar-toggler">
            <a href="<?=site_url('login/logout');?>" class="dropdown-toggle">
            <i class="fa fa-power-off"></i>
            </a>
          </li>
          <!-- END QUICK SIDEBAR TOGGLER -->
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
    </div>
  </div>
  <div class="page-sidebar-wrapper">
    <?php 
      $uri = $this->uri->segment(1);
      $uri1 = $this->uri->segment(2);
    ?>
    <div class="page-sidebar navbar-collapse collapse">
      <ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
          <div class="sidebar-toggler">
          </div>
        </li>
        <?php
        if(isset($profile['role']) && ($profile['role']!="2" && $profile['role']!="3"))
        {
        ?>
        <li class="start <?=($uri=='manager')?'active':'';?>">
          <a href="<?=site_url('manager');?>">
          <i class="fa fa-user"></i>
          <span class="manager">Project Manager</span>
          <?=($uri=='manager')?"<span class='selected'>":"";?>
          </a>
        </li>
        <?php
      }
      if(isset($profile['role']) && $profile['role']!="3")
        {
      ?>
      <li class="start <?=($uri=='superintendent')?'active':'';?>">
          <a href="<?=site_url('superintendent');?>">
          <i class="fa fa-user"></i>
          <span class="superintendent">Superintendent</span>
          <?=($uri=='superintendent')?"<span class='selected'>":"";?>
          </a>
        </li>
      <?php
    }
    ?>
        <li class="start <?=($uri=='contractors')?'active':'';?>">
          <a href="<?=site_url('contractors');?>">
          <i class="fa fa-users"></i>
          <span class="title">Sub Contractors</span>
          <?=($uri=='contractors')?"<span class='selected'>":"";?>
          </a>
        </li>
        <li class="start <?=($uri=='project')?'active':'';?>">
          <a href="<?=site_url('project');?>">
          <i class="fa fa-anchor"></i>
          <span class="title">Project</span>
          <?=($uri=='project')?"<span class='selected'>":"";?>
          </a>
        </li>
        <li class="start <?=($uri=='works')?'active':'';?>">
          <a href="<?=site_url('works');?>">
          <i class="fa fa-cogs"></i>
          <span class="title">Work Items</span>
          <?=($uri=='works')?"<span class='selected'>":"";?>
          </a>
        </li>
        <li class="start <?=($uri=='milestone')?'active':'';?>">
          <a href="<?=site_url('milestone');?>">
          <i class="fa fa-sitemap"></i>
          <span class="title">Item Status</span>
          <?=($uri=='milestone')?"<span class='selected'>":"";?>
          </a>
        </li>
        <li class="start <?=($uri=='reports')?'active':'';?>">
          <a href="<?=site_url('reports');?>">
          <i class="fa fa-file"></i>
          <span class="title">Reports</span>
          <?=($uri=='reports')?"<span class='selected'>":"";?>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php endif;?>
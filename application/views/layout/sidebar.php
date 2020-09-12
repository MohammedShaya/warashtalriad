 <style>
 .fontsize{
    
       font-size: 4;
       font-family: 'Roboto-Bold';
 }
 </style>
 <aside class="main-sidebar"  id="alert2" >   
 
                        <form class="navbar-form navbar-left search-form2" role="search"  action="<?php echo site_url('admin/admin/search'); ?>" method="POST">
                          <!--   <?php echo $this->customlib->getCSRF(); ?> -->
                            <div class="input-group ">

                                <input type="text"  name="search_text" class="form-control search-form" placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>  
        
                <section class="sidebar" id="sibe-box">
                          <ul class="sidebar-menu ">


    <?php if (($this->rbac->hasPrivilege('initializing_system', 'can_view') 
      ||($this->rbac->hasPrivilege('about', 'can_view')) ||
($this->rbac->hasPrivilege('social_media', 'can_view')))) {?> 
                     <li class="treeview <?php echo set_Topmenu('setting_system'); ?>">
                                    <a href="#">
                                        <i class="fa fa-cogs"></i> <span class="fontsize"><?php echo $this->lang->line('initializing_system'); ?></span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                         <?php  if ($this->rbac->hasPrivilege('setting', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('setting/index'); ?>"><a href="<?php echo base_url(); ?>basic_info"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('setting'); ?></a></li>
                                       <?php  }?> 
                                    
                                    <?php  if ($this->rbac->hasPrivilege('about', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('about/index'); ?>"><a href="<?php echo base_url(); ?>about"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('about'); ?></a></li>
                                       <?php  }?> 

                                        <?php  if ($this->rbac->hasPrivilege('social_media', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('social_media/index'); ?>"><a href="<?php echo base_url(); ?>social_media"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('social_media'); ?></a></li>
                                       <?php  }?> 
                                    
                                      </ul>
                 </li><?php }  ?>
    <?php if (($this->rbac->hasPrivilege('initializing_produect', 'can_view') 
      ||($this->rbac->hasPrivilege('groups', 'can_view')) 
      ||($this->rbac->hasPrivilege('offers', 'can_view')) ||
($this->rbac->hasPrivilege('products', 'can_view')))) {?> 
                     <li class="treeview <?php echo set_Topmenu('setting'); ?>">
                                    <a href="#">
                                        <i class="fa fa-cogs"></i> <span class="fontsize"><?php echo $this->lang->line('initializing_produect'); ?></span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                    <?php  if ($this->rbac->hasPrivilege('groups', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('groups/index'); ?>"><a href="<?php echo base_url(); ?>groups"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('groups'); ?></a></li>
                                       <?php  }?> 

                                        <?php  if ($this->rbac->hasPrivilege('products', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('products/index'); ?>"><a href="<?php echo base_url(); ?>products"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('products'); ?></a></li>
                                       <?php  }?>
                                          <?php  if ($this->rbac->hasPrivilege('offers', 'can_view')) {  ?>
                                            <li class="<?php echo set_Submenu('offers/index'); ?>"><a href="<?php echo base_url(); ?>offers"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('offers'); ?></a></li>
                                       <?php  }?> 
                                    
                                      </ul>
                 </li><?php }  ?>
                 
        <?php if ($this->rbac->hasPrivilege('users', 'can_view') ||
          ($this->rbac->hasPrivilege('userlog', 'can_view'))||
($this->rbac->hasPrivilege('users_setting', 'can_view'))) { 
            ?>
         <li class="treeview <?php echo set_Topmenu('users'); ?>">
                                    <a href="#">
                                        <i class="fa fa-cogs"></i> <span class="fontsize"><?php echo $this->lang->line('users'); ?></span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                      <ul class="treeview-menu">
                                         <?php if ($this->rbac->hasPrivilege('users_setting', 'can_view')) {?> 
                                            <li class="<?php echo set_Submenu('users/index'); ?>"><a href="<?php echo base_url(); ?>user"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('users_setting'); ?></a></li>
                                          <?php }  ?>
                                           
                                      <?php   if ($this->rbac->hasPrivilege('userlog', 'can_view')) { ?>  
                                            <li class="<?php echo set_Submenu('user/getUSerLog'); ?>"><a href="<?php echo base_url(); ?>user/getUSerLog"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('userlog'); ?></a></li>
                                           <?php } ?>
                                      </ul>
                                   
                 </li>
               <?php }?>



                          <?php if ($this->rbac->hasPrivilege('comments', 'can_view') ||
        
($this->rbac->hasPrivilege('ads', 'can_view'))) { 
            ?>
         <li class="treeview <?php echo set_Topmenu('other'); ?>">
                                    <a href="#">
                                        <i class="fa fa-cogs"></i> <span class="fontsize"><?php echo $this->lang->line('other'); ?></span> <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                      <ul class="treeview-menu">
                                         <?php if ($this->rbac->hasPrivilege('comments', 'can_view')) {?> 
                                            <li class="<?php echo set_Submenu('comments/index'); ?>"><a href="<?php echo base_url(); ?>comments"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('comments'); ?></a></li>
                                          <?php }  ?>
                                           
                                      <?php   if ($this->rbac->hasPrivilege('ads', 'can_view')) { ?>  
                                            <li class="<?php echo set_Submenu('ads/index'); ?>"><a href="<?php echo base_url(); ?>ads/index"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('ads'); ?></a></li>
                                            <li class="<?php echo set_Submenu('messages/index'); ?>"><a href="<?php echo base_url(); ?>messages/index"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('messages'); ?></a></li>
                                           <?php } ?>
                                      </ul>
                                   
                 </li>
               <?php }?>   

                    </ul>
                </section>             
            </aside>  
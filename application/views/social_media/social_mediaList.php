<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
 
<div class="content-wrapper" style="min-height: 946px;">  
    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('social_media'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('social_media', 'can_add')) {
                ?>        
                <div class="col-md-4">          
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_social_media'); ?> </h3>
                        </div>
                        <form  action="<?php echo base_url(); ?>social_media/add" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                              
                                <input type="text" class="hidden" id="id" name="id" value="">
                                
                                <div class="form-group iconpicker-container">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('icon'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="icon" name="icon" placeholder="" type="text" class="form-control icon"  value="<?php echo set_value('icon'); ?>" />
                                    <span class="text-danger" id="error_span_icon"><?php echo form_error('icon'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('alt'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="alt" name="alt" placeholder="" type="text" class="form-control"  value="<?php echo set_value('alt'); ?>" />
                                    <span class="text-danger" id="error_span_alt"><?php echo form_error('alt'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('url'); ?></label>
                                    <input autofocus="" id="url" name="url" placeholder="" type="url" class="form-control"  value="<?php echo set_value('url'); ?>" />
                                    <span class="text-danger" id="error_span_url"><?php echo form_error('url'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('order'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="order" name="order" placeholder="" type="number" class="form-control"  value="<?php echo set_value('order'); ?>" />
                                    <span class="text-danger" id="error_span_order"><?php echo form_error('order'); ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                    	 <input class=" " type="checkbox" id="is_active" name="is_active" > <?php echo $this->lang->line('active'); ?>
                                    </label>
                                    <span class="text-danger" id="error_span_is_active"><?php echo form_error('is_active'); ?></span>
                                   
                                </div>
                               
                               
                              
                                
                               
                             
                              
                            </div>
                            <div class="box-footer">
                                <button id="submit_form"  type="submit" class="btn btn-info  pull-right">أضافة</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php 
            }
             ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('social_media', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('social_media'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('social_media'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo $this->lang->line('icon'); ?></th>
                                        <th> <?php echo $this->lang->line('url'); ?></th>
                                        <th> <?php echo $this->lang->line('alt'); ?></th>
                                        <th> <?php echo $this->lang->line('order'); ?></th>
                                        <th> <?php echo $this->lang->line('active'); ?></th>
                                      
                                         <?php
                                    if ($this->rbac->hasPrivilege('social_media', 'can_edit')||
                                        $this->rbac->hasPrivilege('social_media', 'can_delete')) {
                                        ?>
                                        <th class="text-right no-print"> <?php echo $this->lang->line('action'); ?></th>
                                        <?php 
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>

                               
                                  
                                </tbody>
                            </table>
                     
                        </div>
                    </div>
                </div>
            </div> 

        </div> 
    </section>
</div>

<script type="text/javascript">
    
     id_form='#form';
    id_submit_button='#submit_form';
    // get_data(page_url);
    let url='<?php echo base_url('social_media/load_data'); ?>';
$('.icon').iconpicker();
 

   
</script>

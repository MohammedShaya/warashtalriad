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
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('basic_info'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('basic_info', 'can_add')) {
                ?>        
                <div class=" hidden" id="div_edit">          
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_basic_info'); ?> </h3>
                        </div>
                        <form  action="<?php echo base_url(); ?>basic_info/add" id="form"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                              
                                <input type="text" class="hidden" id="id" name="id" value="1">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('name_basic_info'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="name_basic_info" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name_basic_info'); ?>" />
                                    <span class="text-danger" id="error_span_name_basic_info"><?php echo form_error('name_basic_info'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('address'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="address" name="address" placeholder="" type="text" class="form-control"  value="<?php echo set_value('address'); ?>" />
                                    <span class="text-danger" id="error_span_address"><?php echo form_error('address'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('url'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="url" name="url" placeholder="" type="url" class="form-control"  value="<?php echo set_value('url'); ?>" />
                                    <span class="text-danger" id="error_span_url"><?php echo form_error('url'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('phone'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="phone" name="phone1" placeholder="" type="text" class="form-control"  value="<?php echo set_value('phone'); ?>" />
                                    <span class="text-danger" id="error_span_phone"><?php echo form_error('phone'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('phone1'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="phone1" name="phone2" placeholder="" type="text" class="form-control"  value="<?php echo set_value('phone1'); ?>" />
                                    <span class="text-danger" id="error_span_phone1"><?php echo form_error('phone1'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('email'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="email" name="email1" placeholder="" type="email1" class="form-control"  value="<?php echo set_value('email'); ?>" />
                                    <span class="text-danger" id="error_span_email"><?php echo form_error('email'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('email1'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="email1" name="email2" placeholder="" type="email1" class="form-control"  value="<?php echo set_value('email1'); ?>" />
                                    <span class="text-danger" id="error_span_email1"><?php echo form_error('email1'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('logo'); ?></label><small class="req"> *</small>
                                    <input  autofocus="" id="logo" name="logo_image"  placeholder="" type="file" class="form-control" accept=".png, .jpg"  value="<?php echo set_value('logo'); ?>" />
                                    <span class="text-danger" id="error_logo"><?php echo form_error('logo'); ?></span>
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
            <div class="col-md-12 " id="div_show">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('basic_info'); ?></h3>
                        <a data-url='basic_info/get_basic_info' id="edit_basic_info" data-id="1" class="btn btn-primary  pull-left edit_record" >
                            <i class="fa fa-pencil"></i> <?php echo $this->lang->line('basic_info_edit'); ?>
                            </a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('basic_info'); ?></div>
                            <table class="table table-striped table-bordered table-hover ">
                                   <tbody>
                                    <tr>
                                        <th> <?php echo $this->lang->line('name_basic_info'); ?>  :</th>
                                        <th><?php echo $basic_info['name']; ?></th>
                                    </tr>
                                     <tr>
                                        <th> <?php echo $this->lang->line('address'); ?>  :</th>
                                        <th><?php echo $basic_info['address']; ?></th>
                                    </tr>
                                    <tr>
                                        <th> <?php echo $this->lang->line('url'); ?>  :</th>
                                        <th><?php echo $basic_info['url']; ?></th>
                                    </tr>
                                     <tr>
                                        <th> <?php echo $this->lang->line('phone'); ?>  :</th>
                                        <th><?php echo $basic_info['phone1']; ?></th>
                                    </tr>
                                    <tr>
                                        <th> <?php echo $this->lang->line('phone1'); ?>  :</th>
                                        <th><?php echo $basic_info['phone2']; ?></th>
                                    </tr>
                                      <tr>
                                        <th> <?php echo $this->lang->line('email'); ?>  :</th>
                                        <th><?php echo $basic_info['email1']; ?></th>
                                    </tr>
                                    <tr>
                                        <th> <?php echo $this->lang->line('email1'); ?>  :</th>
                                        <th><?php echo $basic_info['email2']; ?></th>
                                    </tr>
                                    <tr>
                                        <th> <?php echo $this->lang->line('logo'); ?>  :</th>
                                        <th><img src="<?php echo base_url().'images/'. $basic_info['logo']; ?>" width="333px" alt=""></th>
                                    </tr>
                            

                               
                                  
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
    let url='';
 

   
</script>

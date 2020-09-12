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
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('about'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('about', 'can_add')) {
                ?>        
                <div class="col-md-4">          
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_about'); ?> </h3>
                        </div>
                        <form  action="<?php echo base_url(); ?>about/add" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                              
                                <input type="text" class="hidden" id="id" name="id" value="">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('subject'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="subject" name="subject" placeholder="" type="text" class="form-control"  value="<?php echo set_value('subject'); ?>" />
                                    <span class="text-danger" id="error_span_subject"><?php echo form_error('subject'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('title'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="title" name="title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('title'); ?>" />
                                    <span class="text-danger" id="error_span_title"><?php echo form_error('title'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('description'); ?></label>
                                    <input autofocus="" id="description" name="description" placeholder="" type="text" class="form-control"  value="<?php echo set_value('description'); ?>" />
                                    <span class="text-danger" id="error_span_description"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('order'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="order" name="order" placeholder="" type="number" class="form-control"  value="<?php echo set_value('order'); ?>" />
                                    <span class="text-danger" id="error_span_order"><?php echo form_error('order'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('image'); ?></label><small class="req"> *</small>
                                    <input  autofocus="" id="image" name="image_primary" multiple placeholder="" type="file" class="form-control" accept=".png, .jpg"  value="<?php echo set_value('image'); ?>" />
                                    <span class="text-danger" id="error_image"><?php echo form_error('image'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                    	 <input class=" " type="checkbox" id="is_active" name="is_active" > <?php echo $this->lang->line('active'); ?>
                                    </label>
                                    <span class="text-danger" id="error_span_is_active"><?php echo form_error('is_active'); ?></span>
                                   
                                </div>
                                <button type="button" class="btn pull-left btn-primary  detailes_row_add"  data-toggle="tooltip" title="اصافة تفاصيل"  ><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_row'); ?></button>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col-md-9"><?php echo $this->lang->line('details'); ?></th>
                                            <th class="col-md-3" colspan="2"><?php echo $this->lang->line('order'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="detailes_tbody">
                                        <tr class="detailes_row">
                                            <td> <textarea   autofocus="" id="details" name="details[]" multiple placeholder="" type="file" class="form-control" accept=".png, .jpg"  value="<?php echo set_value('details'); ?>" ></textarea></td>
                                            <td> <input autofocus="" id="order" name="order_detailes[]" placeholder="" type="number" class="form-control"  value="<?php echo set_value('order'); ?>" /></td>
                                            <td> <button type="button" class="btn pull-left btn-danger btn-xs detailes_row_delete"  data-toggle="tooltip" title="حذف"  ><i class="fa fa-remove"></i> </button></td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                              
                                
                               
                             
                              
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
            if ($this->rbac->hasPrivilege('about', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('about'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('about'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo $this->lang->line('subject'); ?></th>
                                        <th> <?php echo $this->lang->line('title'); ?></th>
                                        <th> <?php echo $this->lang->line('description'); ?></th>
                                        <th> <?php echo $this->lang->line('details'); ?></th>
                                        <th> <?php echo $this->lang->line('order'); ?></th>
                                        <th> <?php echo $this->lang->line('active'); ?></th>
                                        <th> <?php echo $this->lang->line('image'); ?></th>
                                      
                                         <?php
                                    if ($this->rbac->hasPrivilege('about', 'can_edit')||
                                        $this->rbac->hasPrivilege('about', 'can_delete')) {
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
    let url='<?php echo base_url('about/load_data'); ?>';
 

   
</script>

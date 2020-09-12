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
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('products'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('products', 'can_add')) {
                ?>        
                <div class="col-md-4">          
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_products'); ?> </h3>
                        </div>
                        <form  action="<?php echo base_url(); ?>products/add" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                              
                                <input type="text" class="hidden" id="id" name="id" value="">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('groups'); ?></label><small class="req"> *</small>
                                    <select required autofocus="" id="group_id" name="group_id" placeholder="" type="text" class="form-control" >
                                        <option value="1"><?php echo $this->lang->line('select'); ?>   </option>
                                    <?php foreach ($groups as $key => $value): ?>
                                        
                                        <option value=" <?php echo $value['id'] ?>"><?php echo $value['name'] ?>  </option>
                                    <?php endforeach ?>
                                </select>
                                    <span class="text-danger"><?php echo form_error('is_active'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('name_products'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                    <span class="text-danger" id="error_span_name"><?php echo form_error('name'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('description'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="description" name="description" placeholder="" type="text" class="form-control"  value="<?php echo set_value('description'); ?>" />
                                    <span class="text-danger" id="error_span_description"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('order'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="order" name="order" placeholder="" type="number" class="form-control"  value="<?php echo set_value('order'); ?>" />
                                    <span class="text-danger" id="error_span_order"><?php echo form_error('order'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                    	 <input class=" " type="checkbox" id="is_active" name="is_active" > <?php echo $this->lang->line('active'); ?>
                                    </label><small class="req"> *</small>
                                    <span class="text-danger" id="error_span_is_active"><?php echo form_error('is_active'); ?></span>
                                   
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('image_primary'); ?></label><small class="req"> *</small>
                                    <input  autofocus="" id="image" name="image_primary" multiple placeholder="" type="file" class="form-control" accept=".png, .jpg"  value="<?php echo set_value('image'); ?>" />
                                    <span class="text-danger" id="error_image"><?php echo form_error('image'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('image'); ?></label>
                                    <input  autofocus="" multiple id="image" name="OTHER_IMAGE[]" placeholder="" type="file" class="form-control" accept=".png, .jpg"  value="<?php echo set_value('image'); ?>" />
                                    <span class="text-danger" id="error_image"><?php echo form_error('image'); ?></span>
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
            if ($this->rbac->hasPrivilege('products', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('products'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('products'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo $this->lang->line('groups'); ?></th>
                                        <th> <?php echo $this->lang->line('name_products'); ?></th>
                                        <th> <?php echo $this->lang->line('description'); ?></th>
                                        <th> <?php echo $this->lang->line('order'); ?></th>
                                        <th> <?php echo $this->lang->line('active'); ?></th>
                                        <th> <?php echo $this->lang->line('image_primary'); ?></th>
                                      
                                         <?php
                                    if ($this->rbac->hasPrivilege('products', 'can_edit')||
                                        $this->rbac->hasPrivilege('products', 'can_delete')) {
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
    let url='<?php echo base_url('products/load_data'); ?>';
 

   
</script>

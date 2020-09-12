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
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('comments'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('comments', 'can_add')) {
                ?>        
                <div class="col-md-4">          
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_comment'); ?> </h3>
                        </div>
                        <form  action="<?php echo base_url(); ?>comments/add" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>     
                                <?php echo $this->customlib->getCSRF(); ?>
                              
                                <input type="text" class="hidden" id="id" name="id" value="">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('produect'); ?></label><small class="req"> *</small>
                                    <select  autofocus="" id="product_id" name="produect_id" placeholder="" type="text" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?>   </option>
                                    <?php foreach ($products as $key => $value): ?>
                                        
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?>  </option>
                                    <?php endforeach ?>
                                </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('offer'); ?></label><small class="req"> *</small>
                                    <select  autofocus="" id="offer_id" name="offer_id" placeholder="" type="text" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?>   </option>
                                    <?php foreach ($offers as $key => $value): ?>
                                        
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?>  </option>
                                    <?php endforeach ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('email'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="email" name="email" placeholder="" type="email1" class="form-control"  value="<?php echo set_value('email'); ?>" />
                                    <span class="text-danger" id="error_span_email"><?php echo form_error('email'); ?></span>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">ا<?php echo $this->lang->line('comment'); ?></label><small class="req"> *</small>
                                    <textarea autofocus="" id="text" name="text" placeholder="" type="text" class="form-control"  value="<?php echo set_value('text'); ?>" ></textarea>
                                    <span class="text-danger" id="error_span_text"><?php echo form_error('text'); ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                    	 <input class=" " type="checkbox" id="is_active" name="is_active" > <?php echo $this->lang->line('share_commend'); ?>
                                    </label><small class="req"> *</small>
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
            if ($this->rbac->hasPrivilege('comments', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('comments'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('comments'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo $this->lang->line('comment'); ?></th>
                                        <th> <?php echo $this->lang->line('email'); ?></th>
                                        <th> <?php echo $this->lang->line('produect'); ?></th>
                                        <th> <?php echo $this->lang->line('offer'); ?></th>
                                        <th> <?php echo $this->lang->line('share_commend'); ?></th>
                                      
                                         <?php
                                    if ($this->rbac->hasPrivilege('comments', 'can_edit')||
                                        $this->rbac->hasPrivilege('comments', 'can_delete')) {
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
    let url='<?php echo base_url('comments/load_data'); ?>';
 

   
</script>

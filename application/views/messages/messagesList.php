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
            <i class="fa fa-mortar-board"></i>  <?php echo $this->lang->line('messages'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <div class="col-md-12">            
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('messages'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"> <?php echo $this->lang->line('messages'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo $this->lang->line('name_sender'); ?></th>
                                        <th> <?php echo $this->lang->line('email'); ?></th>
                                        <th> <?php echo $this->lang->line('message'); ?></th>
                                        <th> <?php echo $this->lang->line('date'); ?></th>
                                      
                                         <?php
                                    if (
                                        $this->rbac->hasPrivilege('messages', 'can_delete')) {
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
    let url='<?php echo base_url('messages/load_data'); ?>';
 

   
</script>

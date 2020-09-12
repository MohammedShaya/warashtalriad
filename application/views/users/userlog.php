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
            <i class="fa fa-eye"></i> <?php echo $this->lang->line('users_log'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
       
            
   
            <div class="col-md-12">
          
         
                <div class="box box-primary" id="sublist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('users'); ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('users'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('user_name'); ?></th>
                                        <th><?php echo $this->lang->line('login_date'); ?></th>
                                        <th><?php echo $this->lang->line('user_agent'); ?></th>
                                        <th style="text-align: center"><?php echo $this->lang->line('ip'); ?></th>
                                        
                                      
                        
                                     
                                    </tr>
                                </thead>
                                <tbody>

                               
                                    <?php
                                    $count = 1;
                                    foreach ($user_list as $subject) {
                                        ?>
                                        <tr>
                                            <td class=""> <?php echo $subject['first_name']." ".$subject['father_name']." ".$subject['last_name'] ?></td> 
                                             <td class=""> <?php echo $subject['login_datetime']?></td> 

                                                <td class=""> <?php echo $subject['user_agent']?></td>
                                                <td class=""> <?php echo $subject['ipaddress']?></td>  
                    


                   <?php }?>
                                        </tr>
                                        <?php
                                    // }
                                    $count++;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 

        </div> 
    </section>
</div>


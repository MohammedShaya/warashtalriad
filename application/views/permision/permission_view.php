
<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-gears"></i> <?php echo $this->lang->line('premission_'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('permission'); ?> (
                         <?php echo $user_list['first_name']." ".$user_list['father_name']." ".$user_list['last_name'] ?>) </h3>
                    </div>
                    <form id="form1" action="<?php echo site_url('user/getUserPermission')?>/<?php echo $user_list["id"] ?>"  
                        id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">

                            <?php echo $this->customlib->getCSRF(); ?>  
                            <input type="hidden" name="role_id" value="<?php ?>"/>
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        
                                        <th><?php echo $this->lang->line('feature'); ?></th>
                                        <th><?php echo $this->lang->line('view'); ?></th>
                                        <th><?php echo $this->lang->line('add'); ?></th>
                                        <th><?php echo $this->lang->line('edit'); ?></th>
                                        <th><?php echo $this->lang->line('delete'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php foreach ($permission_list as  $key=>$value) { ?>
                                    <td>
                                        


                                    <input type="hidden" name="permission_ids[]" value="<?php echo $value['p_id']?>" />

                                       <input type="hidden" name="premission_id<?php echo $value['p_id']?>" value="<?php echo $value['id']?>" />
                                                   
                                        <label><?php echo $this->lang->line($value['name']); ?></label>
                                    </td>
                       
                                    <td>
                                    <label class="">
     <input class="<?php if($value['has_view']=='1')  echo(' '); else echo('hidden');?>" type="checkbox" name="can_view<?php echo $value['p_id']?>" 
     <?php if($value['can_view']=='on')  echo('checked'); else echo('');?>  > 
                                       </label> 
                                    

                                    </td>


                                    <td> <label class="">
     <input class="<?php if($value['has_add']=='1')  echo(' '); else echo('hidden');?>" 
     type="checkbox"  name="can_add<?php echo $value['p_id']?>" 
     <?php if($value['can_add']=='on')  echo('checked'); else echo('');?>  > 
                                       </label> 
                                   </td>


                                    <td> <label class="">
     <input class="<?php if($value['has_edit']=='1')  echo(' '); else echo('hidden');?>" type="checkbox" name="can_edit<?php echo $value['p_id']?>" 
     <?php if($value['can_edit']=='on')  echo('checked'); else echo('');?>  > 
                                       </label> 
                                   </td>
 <td> <label class="">
     <input class="<?php if($value['has_delete']=='1')  echo(' '); else echo('hidden');?>" type="checkbox" name="can_delete<?php echo $value['p_id']?>" 
     <?php if($value['can_delete']=='on')  echo('checked'); else echo('');?>  > 
                                       </label> 
                                   </td>
                                    </tr>
                                      <?php  } ?>
                                </tbody>

                            </table>



                        </div>
                        <div class="box-footer">
                            <button type="submit" name="search" value="save" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>
            </div>         

        </div>

    </section>
</div>
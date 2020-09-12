


    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?php echo base_url();?>images/<?php  echo $basic_info['image_background']; ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?php echo $this->lang->line('about'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5 direct_class">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url().'home/';?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo $this->lang->line('home'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('about'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area direct_class">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5><?php echo $this->lang->line('about'); ?></h5>
                        </div>
                        <?php foreach ($about as $key => $value) {?>
                        <div class="single-team-member d-flex align-items-center">
                            <div class="team-member-thumbnail">
                                <img src="<?php echo base_url().'images/',$value['image']; ?>" alt="">
                                
                            </div>
                            <div class="team-member-content">
                                <h6><?php echo $value['subject']; ?></h6>
                                <span><?php echo $value['title']; ?></span>
                                <p><?php echo $value['description']; ?></p>
                                <ul>
                                <?php foreach ($value['points'] as $k => $v) {?>
                                <li><i class="fa fa-check"></i> <?php echo $v['point']; ?></li>
                            <?php }?>
                        </ul>
                            </div>
                        </div>
                        <?php }?>
                        
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                        <!-- Sidebar Widget -->
                           <!-- Sidebar Widget -->
                            <div class="single-sidebar-widget p-30">
                                <!-- Social Followers Info -->
                                <div class="social-followers-info">
                                    <!-- Facebook -->
                                    <?php foreach ($social_media as $key => $value) {?>
                                            <a  href="<?php echo $value['url'];  ?>" class="icos_class <?php echo $value['alt'];  ?>"><i class="<?php echo $value['icon'];  ?>"></i></a>
                                        
                                            <?php   } ?>
                                
                                </div>
                            </div>

                            <!-- Sidebar Widget -->
                            <div class="single-sidebar-widget p-30">
                                <!-- Section Title -->
                                <div class="section-heading">
                                    <h5><?php echo $this->lang->line('info_produect'); ?></h5>
                                </div>

                                <!-- Catagory Widget -->

                                <ul class="catagory-widgets">
                                    <?php foreach ($count as $key => $value) {?> 
                                    <li><a href="<?php echo base_url().'home/about/'.$value['id']; ?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $value['group_name']; ?></span> <span><?php echo $value['sum']; ?></span></a></li>
                                    
                                <?php }?>
                                    
                                </ul>
                            </div>

                            

                            <!-- Sidebar Widget -->
                            <div class="single-sidebar-widget p-30">
                                <!-- Section Title -->
                                <div class="section-heading">
                                <h5><?php echo $this->lang->line('comments'); ?></h5>
                                </div>

                                <!-- Single YouTube Channel -->
                                <?php foreach ($share_command as $key => $value) {?> 
                                <div class="single-youtube-channel d-flex">
                                    <div class="youtube-channel-thumbnail">
                                        <img src="<?php echo base_url().'images/'.$value['image'];?>" alt="">
                                    </div>
                                    <div class="youtube-channel-content text_commend">
                                        <a href="<?php echo base_url(); ?>/home/product/<?php echo $value['id']; ?>" class="channel-title"><?php echo $value['name']; ?></a>
                                        <p><?php echo $value['text']; ?></p>
                                    </div>
                                </div>
                                <?php }?>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url(<?php echo base_url();?>images/<?php  echo $basic_info['image_background']; ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?php echo $this->lang->line('contact'); ?></h2>
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url().'home/';?>"><i class="fa fa-home"
                                    aria-hidden="true"></i> <?php echo $this->lang->line('home'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo $this->lang->line('contact'); ?></li>
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
                <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                    <!-- Google Maps -->
                    <!-- <div class="map-area mb-30">
                            <iframe src="<?php echo base_url();?>images/<?php  echo $basic_info['image_background']; ?>" allowfullscreen></iframe>
                        </div> -->

                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?php echo $this->lang->line('contact'); ?></h5>
                    </div>

                    <div class="contact-information mb-30">
                        <p></p>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p><?php echo $this->lang->line('address'); ?></p>
                                <h6><?php  echo $basic_info['address']; ?></h6>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p><?php echo $this->lang->line('email'); ?>:</p>
                                <h6><?php  echo $basic_info['email1']; ?></h6>
                            </div>
                        </div>
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p><?php echo $this->lang->line('email'); ?>:</p>
                                <h6><?php  echo $basic_info['email2']; ?></h6>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p><?php echo $this->lang->line('phone'); ?>:</p>
                                <h6><?php  echo $basic_info['phone1']; ?></h6>
                            </div>
                        </div>
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-15">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <p><?php echo $this->lang->line('phone'); ?>:</p>
                                <h6><?php  echo $basic_info['phone2']; ?></h6>
                            </div>
                        </div>
                    </div>

                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?php echo $this->lang->line('message_me'); ?></h5>
                    </div>
                    <div id="message"></div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="<?php echo base_url();?>home/add_message" id="form_commnt" method="post">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="<?php echo $this->lang->line('name_sender'); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="<?php echo $this->lang->line('email'); ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10"
                                            placeholder="<?php echo $this->lang->line('Message'); ?>"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <button class="btn mag-btn mt-30 pull-left"
                                        type="submit"><?php echo $this->lang->line('send');?></button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <a href="<?php echo $value['url'];  ?>" class="icos_class <?php echo $value['alt'];  ?>"><i
                                    class="<?php echo $value['icon'];  ?>"></i></a>

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
                            <li><a href="<?php echo base_url().'home/about/'.$value['id']; ?>"><span><i
                                            class="fa fa-angle-double-right"
                                            aria-hidden="true"></i><?php echo $value['group_name']; ?></span>
                                    <span><?php echo $value['sum']; ?></span></a></li>

                            <?php }?>

                        </ul>
                    </div>
                    <div class="single-sidebar-widget">

                        <div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">
                            <div class="carousel-inner mdb-lightbox" role="listbox">
                                <div id="mdb-lightbox-ui"></div>
                                <?php foreach ($ads as $k => $v) {
            $active='';
            if($k==1){
                $active='active';
            }?>

                                <!--First slide-->
                                <div class="carousel-item <?php echo $active; ?> text-center item_div">

                                    <figure class="col-md-12 d-md-inline-block">
                                        <a href="<?php echo $v['url'];?>">
                                            <img src="<?php echo base_url();?>images/<?php  echo $v['image']; ?>"
                                                class="img-fluid imag_item_div">
                                            <h5><?php echo $v['title'];?></h5>
                                        </a>
                                    </figure>


                                </div>
                                <!--/.First slide-->
                                <?php }?>
                            </div>
                        </div>
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
                                <a href="<?php echo base_url(); ?>/home/product/<?php echo $value['id']; ?>"
                                    class="channel-title"><?php echo $value['name']; ?></a>
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
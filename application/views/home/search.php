<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay"
    style="background-image: url(<?php echo base_url();?>images/<?php  echo $basic_info['image_background']; ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?php echo 
                        $this->lang->line('reasult') .'->'.$search;
                        
                        ?></h2>
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
                            <?php echo $this->lang->line('reasult').'->'.$search; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
<style>
    #owl-demo .item {
        margin: 3px;
    }

    #owl-demo .item img {
        display: block;
        width: 100%;
        height: auto;
    }
</style>


<!-- ##### Contact Area Start ##### -->
<section class="contact-area direct_class">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="about-us-content bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?php echo $this->lang->line('reasult').'->'.$search; ?></h5>
                    </div>
                    <!--Carousel Wrapper-->
                    <?php foreach ($produect_search as $key => $value) {?>
                    <div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">





                        <!--Slides and lightbox-->

                        <div class="carousel-inner mdb-lightbox" role="listbox">
                            <div id="mdb-lightbox-ui"></div>
                            <?php foreach ($value['images'] as $k => $v) {
            $active='';
            if($k==1){
                $active='active';
            }?>

                            <!--First slide-->
                            <div class="carousel-item <?php echo $active; ?> text-center item_div">

                                <figure class="col-md-12 d-md-inline-block">
                                    <a href="<?php echo base_url();?>home/produect/<?php  echo $value['id']; ?>"
                                        data-size="1600x1067">
                                        <img src="<?php echo base_url();?>images/<?php  echo $v['image']; ?>"
                                            class="img-fluid imag_item_div">
                                    </a>
                                </figure>


                            </div>
                            <!--/.First slide-->
                            <?php }?>
                        </div>
                        <div>
                            <a href="<?php echo base_url();?>home/produect/<?php  echo $value['id']; ?>">
                                <h2><?php  echo $value['name']; ?></h2>
                                <h5><?php  echo $value['description']; ?></h5>
                            </a>
                            <div class="single-featured-post">
                                <div dir='ltr'
                                    class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a><i class="fa fa-eye" aria-hidden="true"></i>
                                            <?php echo $value['shows']; ?></a>
                                        <a href="#" class="add_likes" data-id="<?php echo $value['id']; ?>"><i
                                                class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            <?php echo $value['likes']; ?></a>
                                        <a href="<?php echo base_url().'home/produect/'.$value['id'];?>"><i
                                                class="fa fa-comments-o" aria-hidden="true"></i>
                                            <?php echo $value['sum_comment']; ?></a>
                                    </div>
                                    <!-- Share Info -->
                                    <div class="share-info">
                                        <a href="#" class="sharebtn"><i class="fa fa-share-alt"
                                                aria-hidden="true"></i></a>
                                        <!-- All Share Buttons -->
                                        <div class="all-share-btn d-flex">
                                            <a href="http://www.facebook.com/share.php?u=<?php echo base_url().'home/produect/'.$value['id'];?>&amp;title=<?php echo $value['name'];?>"
                                                class="facebook" target="_blank"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a href="http://twitter.com/home?status=<?php echo $value['name'];?>+<?php echo base_url().'home/produect/'.$value['id'];?>"
                                                class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="https://plus.google.com/share?url=<?php echo base_url().'home/produect/'.$value['id'];?>"
                                                class="google-plus"><i class="fa fa-google-plus"
                                                    aria-hidden="true"></i></a>
                                            <a href="https://api.whatsapp.com/send?text=<?php echo base_url().'home/produect/'.$value['id'];?>"
                                                target="_blank" class="whatsapp"><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i></a>
                                            <a href="https://t.me/share/url?url=<?php echo base_url().'home/produect/'.$value['id'];?>&amp;text=<?php echo $value['name'];?>"
                                                target="_blank" class="telegram"><i class="fa fa-telegram"
                                                    aria-hidden="true"></i></a>

                                            <a href="#" class="instagram"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Slides-->

                    </div>
                    <!--/.Carousel Wrapper-->
                    <hr>
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
                            <li><a href="<?php echo base_url().'home/group/'.$value['id']; ?>"><span><i
                                            class="fa fa-angle-double-left"
                                            aria-hidden="true"></i><?php echo ' '.$value['group_name']; ?></span>
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
<!-- ##### Mag Posts Area Start ##### -->


<!-- ##### Hero Area Start ##### -->
<div class="hero-area owl-carousel">
    <!-- Single Blog Post -->
    <?php foreach ($offer as $key => $value) {?>
    <div class="hero-blog-post bg-img bg-overlay"
        style="background-image: url(<?php echo base_url().'images/'.$value['image'];?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                            <a
                                href="<?php echo base_url().'home/offer'.$value['id'];?>"><?php echo $value['created_at'];?></a>
                        </div>
                        <a href="<?php echo base_url().'home/offer'.$value['id'];?>" class="post-title"
                            data-animation="fadeInUp" data-delay="300ms"><?php echo $value['name'];?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<!-- ##### Hero Area End ##### -->


<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5><?php echo $this->lang->line('last_share_offer'); ?></h5>
            </div>
            <?php foreach ($produect_last as $key => $value) {?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?php echo base_url().'images/'.$value['image'];?>" alt="">
                </div>
                <div class="post-content commint_">
                    <a href="<?php echo base_url().'home/produect/'.$value['id'];?>" class="post-title">
                        <?php echo $value['group_name']; ?><br>
                        <strong> <?php echo $value['name']; ?> </strong>
                    </a>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="<?php echo base_url().'home/produect'.$value['id'];?>"><i class="fa fa-eye"
                                aria-hidden="true"></i> <?php echo $value['shows']; ?></a>
                        <a href="<?php echo base_url().'home/produect'.$value['id'];?>"><i class="fa fa-thumbs-o-up"
                                aria-hidden="true"></i> <?php echo $value['likes']; ?></a>
                        <a href="<?php echo base_url().'home/produect'.$value['id'];?>"><i class="fa fa-comments-o"
                                aria-hidden="true"></i> <?php echo $value['sum_comment']; ?></a>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget">

            <div id="marquee" class="section wb">

                <div class="section-title text-center">

                    <marquee direction=" left
                    " behavior="scroll" scrollamount="4" onmouseenter="this.stop()" onmouseleave="this.start()">
                        <?php foreach ($product_image as $key => $value) {
                              ?>
                        <img class="image_marquee" src="<?php echo base_url().'images/'.$value['image'];?>" width="300"
                            height="200">

                        <?php } ?>
                    </marquee>
                </div><!-- end title -->

            </div><!-- end container -->

        </div>

        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5><?php echo $this->lang->line('about'); ?></h5>
            </div>

            <!-- Single Blog Post -->
            <?php foreach ($about as $key => $value) {
                    if($value){?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?php echo base_url().'images/'.$value['image'];?>" alt="">
                </div>
                <div class="post-content commint_">
                    <a href="<?php echo base_url().'home/about/'.$value['id'];?>" class="post-title">
                        <?php echo $value['subject']; ?><br>
                        <strong> <?php echo $value['title']; ?> </strong>
                        <?php echo $value['description']; ?>
                    </a>
                    <div class="post-meta d-flex justify-content-between">

                    </div>
                </div>
            </div>
            <?php } }?>



        </div>
    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
        <!-- Trending Now Posts Area -->

        <!-- Sports Videos -->
        <?php foreach ($produect as $k => $group) {?>
        <div class="sports-videos-area">
            <!-- Section Title -->
            <div class="section-heading">
                <h5> <?php echo $group['name']; ?> </h5>
            </div>

            <div class="sports-videos-slides owl-carousel mb-30" id="group_<?php echo $group['id'];?>">
                <!-- Single Featured Post -->
                <?php foreach ($group['produect'] as $key => $value) {?>
                <div class="single-featured-post group_slider" id="<?php echo $group['id'];?>"  >
                    <!-- Thumbnail -->
                    <div class="post-thumbnail mb-50 ">
                        <img class="img_class" src="<?php echo base_url().'images/'.$value['image'];?>" alt="">

                    </div>
                    <!-- Post Contetnt -->
                    <div class="post-content image_info">
                        <div class="post-meta">
                            <a
                                href="<?php echo base_url().'home/produect/'.$value['id'];?>"><?php echo $value['created_at'];?></a>
                            <a
                                href="<?php echo base_url().'home/group'.$group['id'];?>"><?php echo $group['name'];?></a>
                        </div>
                        <a href="video-post.html" class="post-title"><?php echo $value['name'];?></a>
                        <p><?php echo $value['description'];?></p>
                    </div>
                    <!-- Post Share Area -->
                    <div class="post-share-area d-flex align-items-center justify-content-between">
                        <!-- Post Meta -->
                        <div class="post-meta pl-3">
                                        <a ><i
                                                class="fa fa-eye" aria-hidden="true"></i>
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
                            <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            <!-- All Share Buttons -->
                            <div class="all-share-btn d-flex">
                                <a href="http://www.facebook.com/share.php?u=<?php echo base_url().'home/produect/'.$value['id'];?>&amp;title=<?php echo $value['name'];?>" class="facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="http://twitter.com/home?status=<?php echo $value['name'];?>+<?php echo base_url().'home/produect/'.$value['id'];?>" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://plus.google.com/share?url=<?php echo base_url().'home/produect/'.$value['id'];?>" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="https://api.whatsapp.com/send?text=<?php echo base_url().'home/produect/'.$value['id'];?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="https://t.me/share/url?url=<?php echo base_url().'home/produect/'.$value['id'];?>&amp;text=<?php echo $value['name'];?>" target="_blank" class="telegram"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>


            </div>
        </div>
        <?php } ?>




    </div>

    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
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
                                aria-hidden="true"></i> <?php echo ' '.$value['group_name']; ?></span>
                        <span><?php echo $value['sum']; ?></span></a></li>

                <?php }?>

            </ul>
        </div>

        <!-- Sidebar Widget -->
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



        <!-- Sidebar Widget -->
        <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                <h5><?php echo $this->lang->line('contact'); ?></h5>
            </div>

            <div class="newsletter-form">
            <div id="message"></div>
                <div class="contact-form-area" dir="rtl">
                <form action="<?php echo base_url();?>home/add_message" id="form_commnt" method="post">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="name" id="name"
                                            placeholder="<?php echo $this->lang->line('name_sender'); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input required type="email" name="email" class="form-control" id="email"
                                            placeholder="<?php echo $this->lang->line('email'); ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea required name="message" class="form-control" id="message" cols="30" rows="10"
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
    </div>
</section>
<!-- ##### Mag Posts Area End ##### -->
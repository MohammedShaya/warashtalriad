
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-widget" style="top: 40%">
                        <!-- Logo -->
                    
                        <div class="footer-social-info">
                              <?php foreach ($social_media as $key => $value) {?>
                            <a href="<?php echo $value['url'];  ?>" class="<?php echo $value['alt'];  ?>"><i class="<?php echo $value['icon'];  ?>"></i></a>
                           
                             <?php   } ?>
                        </div>
                        
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-widget" style="margin-bottom: 40px">
                        <h6 class="widget-title"><?php echo $this->lang->line('Links'); ?></h6>
                        <div class="widget-title">
                        <nav class="footer-widget-nav">
                            <ul>
                                  <?php foreach ($navbar as $key => $value) {?>
                                    <li style="display: block;
                                 width: 100%;max-width:100%; flex: auto"><a href="<?php echo base_url().'navbar/'. $value['id']  ?>"> <?php echo $value['name'].'  ';  ?><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li><br>
                                       
                                  <?php   } ?>
                              
                            </ul>
                        </nav>
                    </div>
                    </div>
                </div>
                      <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-widget" style="margin-bottom: 40px">
                        <h6 class="widget-title"><?php echo $this->lang->line('Links'); ?></h6>
                          <div class="widget-title">
                            <div class="email-box">
                                 <a style="color: #fff;" href="email:<?php echo $basic_info['email1'] ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $basic_info['email1'] ?></a>
                            </div><br>
                             <div class="email-box">
                                 <a style="color: #fff;" href="email:<?php echo $basic_info['email2'] ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $basic_info['email2'] ?></a>
                            </div><br>
                            <div class="phone-box">
                              <a style="color: #fff;" href="tel:<?php echo $basic_info['phone1'] ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $basic_info['phone1'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
              
               
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-8">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://Abu_shaya.com" target="_blank">Abu_shaya</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url(); ?>static/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url(); ?>static/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url(); ?>static/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url(); ?>static/js/active.js"></script>
    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
        let id_form = '#form_commnt';
        let id_submit_button = '#submit_form';
        let page_url = '';
        let table=0;
    </script>
     <script src="<?php echo base_url(); ?>backend/toast-alert/toastr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>backend/js/sstoast.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>backend/js/new_js.js"></script>

    <script>
        $('.carousel').carousel({
            interval: 2000
        });
       

// $('.carousel').carousel('pause')
    </script>
</body>

</html>
   ?>
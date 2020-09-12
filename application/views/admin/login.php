<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#424242" />
    <title><?php echo $basic_info['name']; ?></title>

<link rel="icon" href="<?php echo base_url(); ?>/images/<?php echo $basic_info['logo']; ?>">

   
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/usertemplate/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/form-elements.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/style.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/usertemplate/assets/css/jquery.mCustomScrollbar.min.css">
    <style type="text/css">
        .col-md-offset-3 {
            margin-left: 29%;
        }

        @media (max-width: 767px){.col-md-offset-3 {margin-left: 0;}}
            .example {
            background-image: url('<?php echo base_url(); ?>backend/usertemplate/assets/img/backgrounds/15.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 600;
            width: 300px;
            border-bottom-left-radius: 10%;
        }

        body {
            background-color:
                antiquewhite;
        }

        #form-username,
        #form-password {
            direction: rtl !important;
        }

        .font-white.bolds {
            text-align: center;
        }
    </style>

</head>

<body>
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row col-sm-offset-4 col-lg-offset-4">
                    <?php 
                        $empty_notice=0;
                        $offset="";
if(empty($notice)){
    $empty_notice=1;
    $offset="col-sm-offset-3 col-lg-offset-4 ";

}
                         ?>
                    <div class="col-lg-5 col-sm-5">
                        <div class="example">


                            <div class="form-bottom">
                                <h3 style="margin-top :100%" class="font-white bolds">
                                    <?php echo $this->lang->line('login'); ?></h3>
                                <?php
                                    if (isset($error_message)) {
                                        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                    }
                                    ?>
                                <?php
                                    if ($this->session->flashdata('message')) {
                                        echo "<div class='alert alert-success'>" . $this->session->flashdata('message') . "</div>";
                                    };
                                    ?>

                                <form action="<?php echo site_url('site/login') ?>" method="post">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <input type="text" name="username"
                                            placeholder="<?php echo $this->lang->line('username'); ?>" value=""
                                            class="form-username form-control" id="form-username">
                                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" value="" name="password"
                                            placeholder="<?php echo $this->lang->line('passwords'); ?>"
                                            class="form-password form-control" id="form-password">
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <button type="submit" style="color: black ;"
                                        class="btn"><?php echo $this->lang->line('sign_in'); ?></button>
                                </form>
                                <!-- <a href="<?php echo site_url('site/forgotpassword') ?>" class="forgot"><?php echo $this->lang->line('forgot_password'); ?>?</a> -->
                            </div>
                        </div>
                    </div>
                    <?php 
//                   if(!$empty_notice){
// <!-- 
//  <div class="col-lg-1 col-sm-1">



//  <div class="separatline"></div>






//  </div>  -->
                        

//                   }
                         ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.mousewheel.min.js"></script>

  
</body>

</html>

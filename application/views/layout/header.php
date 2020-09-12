<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="theme-color" content="#424242" />
    <link href="<?php echo base_url(); ?>/images/<?php echo $this->session->userdata()['admin']['info']['logo']; ?>" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/jquery.mCustomScrollbar.min.css">
    <?php
$this->load->view('layout/theme');
?>

    <style type="text/css">
        .upload-image-preview img {
            width: 100%;
            height: 100%;
        }

        #question_image,
        #import_file {
            opacity: 1;
        }

        .image_question {
            height: 50px;
            width: 100%;
        }

        .mailbox-name,
        .sorting {
            text-align: center;
        }
    </style>
    <!-- Bootstrap 3.3.5 RTL -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/bootstrap-rtl/css/bootstrap-rtl.min.css" />
    <!-- Theme RTL style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/AdminLTE-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/ss-rtlmain.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/skins/_all-skins-rtl.min.css" />
    <?php
?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/all.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/datepicker/css/bootstrap-datetimepicker.css">
    <!--file dropify-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/dropify.min.css">
    <!--file nprogress-->
    <link href="<?php echo base_url(); ?>backend/dist/css/nprogress.css" rel="stylesheet">

    <!--print table-->
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!--print table mobile support-->
<!-- Font Awesome CDN -->
<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link href="<?php echo base_url(); ?>backend/js/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>backend/custom/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/datepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url(); ?>backend/datepicker/date.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>backend/js/school-custom.js"></script>
    <script src="<?php echo base_url(); ?>backend/js/sstoast.js"></script>

    <script src="<?php echo base_url(); ?>backend/js/fontawesome-iconpicker.min.js"></script>
    <!-- fullCalendar -->


    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
        let id_form = '#form';
        let id_submit_button = '#submit_form';
        let page_url = '';
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>backend/js/new_js.js"></script>



</head>

<body class="hold-transition skin-blue fixed sidebar-mini ">



    <div class="wrapper">

        <header class="main-header" id="alert">
            <a href="<?php echo base_url(); ?>admin/dashboard" class="logo">
                <span class="logo-mini">S S</span>
                <span class="logo-lg"><img
                        src="<?php echo base_url(); ?>/images/<?php echo $this->session->userdata()['admin']['info']['logo']; ?>"
                        style="color: #fdc689;" alt="<?php echo $this->lang->line('app_name');?>" /></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="col-md-5 col-sm-3 col-xs-5">
                    <span href="#" class="sidebar-session">
                        <?php echo $this->session->userdata()['admin']['info']['name']; ?>
                    </span>
                </div>
                <div class="col-md-7 col-sm-9 col-xs-7">
                    <div class="pull-right">

                        <form class="navbar-form navbar-left search-form" role="search"
                            action="<?php echo site_url('admin/admin/search'); ?>" method="POST">

                            <!-- <div class="input-group" style="padding-top:3px;">
                                <input type="text" name="search_text" class="form-control search-form search-form3"
                                    placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn"
                                        style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;"
                                        class="btn btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                            </div> -->
                        </form>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav headertopmenu">



                                <?php


    $file = "<?php echo base_url(); ?>/backend/images/no_image.png";

                                ?>
                                <li class="dropdown user-menu">
                                    <a class="dropdown-toggle" style="padding: 15px 13px;" data-toggle="dropdown"
                                        href="#" aria-expanded="false"><?php  $user=$this->session->userdata();
                                       
                                        echo $user['admin']['username'].' '.$user['admin']['last_name'];
                                        ?>
                                        <!--   <img src="<?php echo base_url() . $file; ?>" class="topuser-image" alt="User Image"> -->
                                    </a>
                                    <ul class="dropdown-menu dropdown-user menuboxshadow">
                                        <li>
                                            <div class="sstopuser">
                                                <div class="ssuserleft">
                                                    <a href="<?php echo base_url() . "admin/staff/profile/"  ?>">
                                                        <!--   <img src="<?php echo base_url() . $file; ?>" alt="User Image"> --></a>
                                                </div>




                                                <div class="sspass">
                                                    <a class="" href="<?php echo base_url(); ?>site/logout"><i
                                                            class="fa fa-sign-out fa-fw"
                                                            style="padding: 0 20px;"></i><?php echo $this->lang->line('logout'); ?></a>
                                                </div>
                                            </div>
                                            <!--./sstopuser-->
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <?php $this->load->view('layout/sidebar');?>
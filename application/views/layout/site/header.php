<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $basic_info['name']; ?></title>

    <link rel="icon" href="<?php echo base_url(); ?>/images/<?php echo $basic_info['logo']; ?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/custom.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area" dir="rtl">
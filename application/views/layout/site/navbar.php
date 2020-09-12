   <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <a href="<?php echo base_url(); ?>" class="nav-brand"><img src="<?php echo base_url(); ?>/images/<?php echo $basic_info['logo']; ?>" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="<?php echo set_Topmenu('home') ?>"><a href="<?php echo base_url().'home' ; ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                    <?php foreach ($navbar as $key => $value) {?>
                                    <li class="<?php echo set_Topmenu('group_'.$value['id']) ?>"><a href="<?php echo base_url().'home/group/'. $value['id']  ?>"><?php echo $value['name'];  ?></a></li>
                                       
                                  <?php   } ?>
                                    <li class="<?php echo set_Topmenu('about') ?>"><a href="<?php echo base_url().'home/about' ; ?>"><?php echo $this->lang->line('about');?></a></li>
                                    <li class="<?php echo set_Topmenu('contact') ?>"><a href="<?php echo base_url().'home/contact' ; ?>"><?php echo$this->lang->line('contact'); ?></a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="<?php echo base_url().'home/reasult' ; ?>" method="POST">
                                <?php echo $this->customlib->getCSRF(); ?>
                                    <input type="search" name="search" id="topSearch" placeholder="">
                                    <button style="right: 80%;" type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- Login -->
                            <a href="<?php echo base_url().'site/login' ; ?>" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <!-- Submit Video -->
                           
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
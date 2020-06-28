<!DOCTYPE html>
<html>
<head>
    <title>
        Raptor
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yesteryear&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Text+Me+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="http://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css'>
</head>
<body>
    <section id="pbr-topbar" class="pbr-topbar pbr-topbar-v3 hidden-xs hidden-sm">
        <div class="container">
            <div class="topbar-inner d-flex justify-content-between flex-wrap">
                <div class="header-info-wrapper hidden-xs">
                    <div class="header-info d-flex">
                        <div class="header-info-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="header-info-text">
                            <div class="title">Call us</div>
                            <div class="phone">123 - 456 - 7899</div>
                        </div>
                    </div>
                </div>
                <div class="box-user">
                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="link">Account <span class="caret"></span></span>
                    <ul class="dropdown-menu">
                       <!--  <li><a href="login.html" data-toggle="modal" data-target="#modalLoginForm" class="pbr-user-login"><span class="fa fa-user"></span><span class="hidden-sm hidden-xs">Login</span></a></li>
                        <li><a href="register.html" class="opal-user-register"><span class="fa fa-pencil"></span> Register</a></li> -->
                    <li>
                      <a href="<?php echo base_url('register'); ?>" data-toggle="modal" data-target="#modalLoginForm" class="pbr-user-login"><span class="fa fa-user"></span><span class="hidden-sm hidden-xs">Register</span></a>

                    </li>
                    <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end header -->
    <!-- logo and menu -->
    <header id="pbr-masthead" class="site-header pbr-header-v3">
        <div class="no-sticky">
            <div class="header-top">
                <div class="container">
                    <div class="inner clearfix">
                        <div id="pbr-logo" class="logo logo-theme">
                            <a href="<?php echo base_url('home'); ?>">
                                <img src="<?php echo base_url('images/1.png')?>"  width="130px;">
                                <br>
                             <!--    <label class="logo-txt">Liquor Shop</label> -->
                            </a>
                        </div>
                        <div class="header-right">
                            <div id="pbr-mainmenu" class="pbr-mainmenu">
                                <div class="inner">
                                    <nav data-duration="300" class="hidden-xs hidden-sm pbr-megamenu  animate navbar navbar-mega">
                                        <div class="collapse navbar-collapse navbar-mega-collapse">
                                            <ul id="primary-menu" class="nav navbar-nav megamenu">
                                                <li id="menu-item" class="dropdown active menu-item level-0">
                                                    <a href="<?php echo base_url('home'); ?>" class="dropdown-toggle">Home </a>
                                                </li>
                                                 <li id="menu-item" class="dropdown active menu-item level-0"><a href="#">Our Products</a></li>

                                               
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
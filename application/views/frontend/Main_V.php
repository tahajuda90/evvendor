<!doctype html>
<html lang="en" class="fullscreen-bg">
    <head>
        <title>Sistem Evaluasi Monitoring Pengadaan Barang/Jasa</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/pace/themes/orange/pace-theme-minimal.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/slick/slick.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/slick/slick-theme.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/datatables/css-main/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css">
        
        
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/css/main.css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/css/skins/sidebar-nav-darkgray.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url('assets/frontend')?>/css/skins/navbar3.css" type="text/css">
        

    </head>
    <script src="<?= base_url('assets/frontend')?>/vendor/jquery/jquery.min.js"></script>
    <body class="layout-topnav">
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="top-bar clearfix">
                    <div class="container-bar">
                        <div class="navbar-right">
                            <div class="navbar-form navbar-left search-form">
                                <a type="button" class="btn btn-default" href="<?=base_url('login')?>">Sign-in <i class="fa fa-sign-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="navbar-menu" class="bottom-bar clearfix">
                    <div class="navbar-header">
                        <!--<div class="brand visible-xs">
                            <a href="index.html">
                                <img src="assets/img/logo-dark.png" alt="Klorofil Pro Logo" class="img-responsive logo">
                            </a>
                        </div>-->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                            <i class="ti-menu"></i>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="main-nav">
                        <ul class="nav navbar-nav">
                            <?php
                            foreach($menu as $menu){
                                echo '<li><a '.($menu['active']?'class="active"':'').' href="'.$menu['url'].'"><span>'.$menu['nama'].'</span></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="main">
                <div class="main-content">
                    <div class="container">
                        <?php $this->load->view($page)?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <footer>
                <div class="container-fluid">
                    <p class="copyright">&copy; V.1.0. Sistem Evaluasi Monitoring Pengadaan Barang/Jasa.</p>
                </div>
            </footer>
        </div>
        
        
        <script src="<?= base_url('assets/frontend')?>/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/frontend')?>/vendor/pace/pace.min.js"></script><script src="<?= base_url('assets/frontend')?>/scripts/klorofilpro-common.js"></script>
    </body>
</html>
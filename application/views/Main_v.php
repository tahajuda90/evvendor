<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vali/')?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url('assets/vali/')?>js/jquery-3.2.1.min.js"></script>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php $this->load->view('component/header')?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php $this->load->view('component/sidebar')?>
    <main class="app-content">
        <?php $this->load->view($page)?>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('assets/vali/')?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/vali/')?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/vali/')?>js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('assets/vali/')?>js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
  </body>
</html>
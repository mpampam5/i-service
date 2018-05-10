<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="<?=config_item('public')?>fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=config_item('public')?>bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=config_item('public')?>css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="<?=config_item('public')?>css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="<?=config_item('public')?>css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?=config_item('public')?>css/style.css" type="text/css">

    <script type="text/javascript" src="<?=config_item('public')?>js/jquery-2.1.0.min.js"></script>



  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA8FRcoa3YI0Kt2ozvIMdu9kJ97CARIt6c"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/smoothscroll.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/markerwithlabel_packed.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/infobox.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.placeholder.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/icheck.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.vanillabox-0.1.5.min.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jshashtable-2.1_src.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.numberformatter-1.2.3.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/tmpl.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.dependClass-0.1.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/draggable-0.1.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/jquery.slider.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/markerclusterer_packed.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/custom-map.js"></script>
  <script type="text/javascript" src="<?=config_item('public')?>js/custom.js"></script>

    <title><?php echo $title; ?></title>

</head>

<body class="page-homepage navigation-fixed-top map-google" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
<div class="wrapper">
    <!-- menu -->
    <?php $this->load->view('public/menu');?>
    <!-- //menu -->

    <!-- content -->
    <div id="content-view">
    <?php
    if ($content!="") {
      $this->load->view($content);
    }else {
      $this->load->view('public/error404');
    }
    ?>
    </div>
    <!-- //content -->

    <!-- end Page Content -->
    <!-- Page Footer -->
    <?php $this->load->view('public/footer'); ?>
    <!-- end Page Footer -->
</div>


<!--[if gt IE 8]>
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->

<?php if ($content=="public/content"): ?>
  <script>
      _latitude  = -5.1486714;
      _longitude = 119.4340414;
      createHomepageGoogleMap(_latitude,_longitude);
      $(window).load(function(){
          initializeOwl(false);
      });
  </script>
<?php endif; ?>



</body>
</html>

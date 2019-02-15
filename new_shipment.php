<?php  session_start();
  require_once('functions/function.php');
  $oIslogged->check();
  $oPageContent->get_header();
  $oPageContent->get_content('shipment/new_shipment');
  $oPageContent->get_footer();
 ?>

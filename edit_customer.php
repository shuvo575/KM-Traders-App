<?php  session_start();
  require_once('functions/function.php');
  $oIslogged->check();
  $oPageContent->get_header();
  $oPageContent->get_content('customer/customer_edit'); 
  $oPageContent->get_footer();
 ?>

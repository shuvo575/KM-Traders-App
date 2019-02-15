<?php  session_start();
  require_once('functions/function.php');
  $oIslogged->check();
  $oPageContent->get_header();
  $oPageContent->get_content('products/edit_product');
  $oPageContent->get_footer();
 ?>

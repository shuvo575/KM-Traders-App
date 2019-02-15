
<?php  session_start();
  require_once('functions/function.php');
  $oIslogged->check();
  $oPageContent->get_header();
 ?>
  <div class="page-header header-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-3 ml-auto mr-auto">
            <img src="./assets/img/logo.png" alt="" class="img-raised rounded img-fluid">
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="scripts.js"></script>
  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <form action="form.php" method="post">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                  <i class="material-icons">search</i>
              </span>
            </div>
            <input type="text" id="search" name="search" class="form-control" placeholder="Search by Name or Number. . ." autocomplete="off"/>
            <input type="hidden" name="hidden" value="search">
          </div>
          <div id="display"></div>
          <div class="space-50 text-center">
          <button class="btn btn-primary btn-round">
            <i class="material-icons">search</i> Search
          </button>
          </div>
        </form>
        <div class="space-30"></div>
      </div>
    </div>
  </div>
<?php $oPageContent->get_footer(); ?>

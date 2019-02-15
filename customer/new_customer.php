
<?php


  if(isset($_GET['phone']))
    {
      $number = $_GET['phone'];
    }else {
      header('Location: index.php');
    }
 ?>

  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>New Customer Registration</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form class="" action="form.php" method="post">
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">assignment_ind</i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Name" name="name" required>
                <input type="hidden" value="new_customer" name="hidden">
              </div>
            </div>
            <div class="col-md-6">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">call</i>
                  </span>
                </div>
                <input type="text" class="form-control" value="<?php echo $number; ?>" name="phone"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">add_location</i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Address" name="address" required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">calendar_today</i>
                  </span>
                </div>
                <input type="text" class="form-control datetimepicker" placeholder="Date & Time" name="datetime" required/>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <div class="space-50"></div>
              <button class="btn btn-primary btn-round">
                <i class="material-icons">library_add</i> Add to Database
              </button>
            </div>
          </div>
          <div class="space-50"></div>
        </div>
      </div>
    </div>
  </form>

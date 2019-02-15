<?php
$oDatabase= new Database();
if(isset($_GET['phone']))
  {
    $number = $_GET['phone'];
    $sql = "SELECT * FROM customer_details WHERE customer_phone='$number'";
    $result = $oDatabase->fquery($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows === 0) {
      header('Location: index.php');
   }
  }else {
    header('Location: index.php');
  }

 ?>

  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Edit Customer Details</h1>
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
                <input type="text" class="form-control" name="name" value="<?php echo $row['customer_name']; ?>"/>
                <input type="hidden" name="hidden" value="edit_cus">
                <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']; ?>">
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
                <input type="text" class="form-control" name="phone" value="<?php echo $row['customer_phone']; ?>"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">edit_location</i>
                  </span>
                </div>
                <input type="text" class="form-control" name="address" value="<?php echo $row['customer_address']; ?>"/>
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
                <input type="text" class="form-control datetimepicker" name="datetime" value="<?php echo $row['customer_datetime']; ?>" placeholder="<?php echo $row['customer_datetime']; ?>" />
              </div>
            </div>
            <div class="col-md-12 text-center">
              <div class="space-50"></div>
              <button class="btn btn-primary btn-round">
                <i class="material-icons">library_add</i> Update Data
              </button>
            </div>
          </div>
          <div class="space-50"></div>
        </div>
      </div>
    </div>
  </form>
  

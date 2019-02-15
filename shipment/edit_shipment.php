<?php
$oDatabase= new Database();
if(isset($_GET['shipment_id']))
  {
    $shipment_id = $_GET['shipment_id'];
    $sql = "SELECT * FROM shipment WHERE shipment_id='$shipment_id'";
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
            <h1>Edit Shipment #<?php echo $shipment_id; ?></h1>
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
                      <i class="material-icons">note_add</i>
                  </span>
                </div>
                <input type="text" class="form-control" name="note" value="<?php echo $row["shipment_note"]; ?>"/>
                <input type="hidden" class="form-control" name="hidden" value="edit_shipment"/>
                <input type="hidden" class="form-control" name="shipment_id" value="<?php echo $shipment_id; ?>"/>
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
                <input type="text" class="form-control datetimepicker" placeholder="<?php echo $row["shipment_datetime"]; ?>" readonly/>
              </div>
            </div>
            <table width="100%">
              <?php
                  $ssql = "SELECT * FROM shipment_details WHERE shipment_id = '$row[shipment_id]'";
                  $sresult = $oDatabase->fquery($ssql);
                while($srow = $sresult->fetch_assoc()) {
                  $pssql = "SELECT * FROM products WHERE product_id = '$srow[product_id]'";
                  $psresult = $oDatabase->fquery($pssql);
                  $psrow = $psresult->fetch_assoc();

                 ?>
              <tr>
                <td width="40%">
                  <div class="col-md-12">
                    <div class="space-50"></div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">add_shopping_cart</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php echo $psrow["product_name"]; ?>" placeholder="Product" readonly/>
                      <input type="hidden" class="form-control" name="product_id[]" value="<?php echo $psrow["product_id"]; ?>" placeholder="Product" readonly/>
                    </div>
                  </div>
                </td>
                <td width="30%">
                  <div class="col-md-12">
                    <div class="space-50"></div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">exposure_plus_1</i>
                        </span>
                      </div>
                      <input type="number" class="form-control" name="quantity[]" value="<?php echo $srow["product_quantity"]; ?>" placeholder="Quantity" />
                    </div>
                  </div>
                </td>
                <td width="30%">
                  <div class="col-md-12">
                    <div class="space-50"></div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">attach_money</i>
                        </span>
                      </div>
                      <input type="number" class="form-control" placeholder="Rate" name="rate[]" value="<?php echo $srow["product_rate"]; ?>" />
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
            </table>
            <div class="col-md-12 text-center">
              <div class="space-50"></div>
              <button class="btn btn-primary btn-round">
                <i class="material-icons">library_add</i> Update Shipment
              </button>
            </div>
          </div>
          <div class="space-50"></div>
        </div>
      </div>
    </div>
  </form>
  

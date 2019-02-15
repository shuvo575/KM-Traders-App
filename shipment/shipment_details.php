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
        <div class="space-70 col-md-12"></div>
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Shipment #<?php echo $row["shipment_id"]; ?></h1>
            <h3><?php echo $row["shipment_datetime"]; ?></h3>
            <h4>Note: <?php echo $row["shipment_note"]; ?></h4>
            <h4>Total Value: Tk.<?php echo $row["shipment_total"]; ?></h4>
          </div>
        </div>
        <div class="space-70 col-md-12"></div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row text-center">
          
          <div class="col-md-12 ml-auto mr-auto">
            <div class="space-50"></div>
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
              <div class="brand">
                <h2>Product Details of This Shipment</h2>
              </div>
            </div>
            <div class="col-md-2">
              <a href="edit_shipment.php?shipment_id=<?php echo $row["shipment_id"]; ?>" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="Edit Shipment">
                <i class="material-icons">border_color</i> </a>
            </div>
            </div>
            <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>Product Name</th>
                      <th>Rate</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                  </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
              </tfoot>
              <tbody>
                  <?php
                  $ssql = "SELECT * FROM shipment_details WHERE shipment_id = '$row[shipment_id]'";
                  $sresult = $oDatabase->fquery($ssql);
                while($srow = $sresult->fetch_assoc()) {
                  $pssql = "SELECT * FROM products WHERE product_id = '$srow[product_id]'";
                  $psresult = $oDatabase->fquery($pssql);
                  $psrow = $psresult->fetch_assoc();

                 ?>
                  <tr>
                      <td><?php echo $psrow["product_name"]; ?></td>
                      <td>Tk. <?php echo $srow["product_rate"]; ?></td>
                      <td><?php echo $srow["product_quantity"].' '.$psrow["product_unit"]; ?></td>
                      <td><?php echo $srow["product_total"]; ?></td>
                  </tr>
                  <?php }
                    
               ?>

              </tbody>
          </table>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>

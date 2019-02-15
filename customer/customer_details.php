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


  <div class="page-header header-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1><?php echo "$row[customer_name]"; ?></h1>
            <h3>Phone: <?php echo "$row[customer_phone]"; ?> &middot; &middot; &middot; Address: <?php echo "$row[customer_address]"; ?></h3>
            <h4>Since: <?php echo "$row[customer_datetime]"; ?></h4>
          </div>
        </div>
        <div class="col-md-12">
          <a href="edit_customer.php?phone=<?php echo "$row[customer_phone]"; ?>" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="Edit Customer Details">
            <i class="material-icons">border_color</i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="space-50"></div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4 text-center">
                <div class="brand">
                  <h2>Order Details</h2>
                </div>
              </div>
              <div class="col-md-4">
                <a href="new_order.php?phone=<?php echo "$row[customer_phone]"; ?>" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Order">
                  <i class="material-icons">add</i>New Order</a>
              </div>
            </div>
            <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th>Invoice</th>
                      <th>Grand Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Details</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Date</th>
                      <th>Invoice</th>
                      <th>Grand Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Details</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php 

                $isql = "SELECT * FROM invoice WHERE customer_id='$row[customer_id]'";
                $iresult = $oDatabase->fquery($isql);
                if ($iresult->num_rows === 0) {
                  echo "No Data Available!";
                }else {
                  while($irow = $iresult->fetch_assoc()) {

                 ?>
                  <tr>
                      <td><?php echo $irow["invoice_datetime"]; ?></td>
                      <td>#<?php echo $irow["invoice_id"]; ?></td>
                      <td><?php if ($irow["invoice_total"]<=0) {
                        echo "Invaid Order";
                      }else{ echo 'Tk.'.$irow["invoice_total"];} ?></td>
                      <td><?php if ($irow["invoice_paid"]<=0) {
                        echo "Full Due";
                      }else{ echo 'Tk.'.$irow["invoice_paid"];} ?></td>
                      <td><?php if ($irow["invoice_total"]-$irow["invoice_paid"]<=0) {
                        echo "Full Paid";
                      }else{ echo 'Tk.'.($irow["invoice_total"]-$irow["invoice_paid"]); } ?></td>
                      <td>
                        <a href="invoice_details.php?invoice_id=<?php echo $irow["invoice_id"]; ?>" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="View Details">
                          <i class="material-icons">assignment</i> Details
                        </a>
                      </td>
                  </tr>
                <?php } } ?>
              </tbody>
          </table>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>

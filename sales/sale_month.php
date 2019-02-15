<?php
$oDatabase= new Database();
if(isset($_GET['year']))
  {
    $year = $_GET['year'];
    $month = $_GET['month'];
    $day = $_GET['day'];
    $isql = "SELECT * FROM invoice WHERE invoice_datetime LIKE '%$day $month $year%'";
    $iresult = $oDatabase->fquery($isql);
    if ($iresult->num_rows === 0) {
      header('Location: sales.php');
      //echo "$year  $month";
   }
  }else {
    header('Location: sales.php');
    //echo "Data not found";
  }

 ?>
  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Sales Report of <?php echo $day.' '. $month.'  '.$year; ?></h1>
          </div>
        </div>
        <div class="col-md-12">
          <a href="customer_edit.html" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="Edit Customer Details">
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
            <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>Date</th>
                      <th>Invoice</th>
                      <th>Grand Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Manage</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Date</th>
                      <th>Invoice</th>
                      <th>Grand Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Manage</th>
                  </tr>
              </tfoot>
              <tbody>
                  <?php 
                if ($iresult->num_rows === 0) {
                  echo "No Data Available!";
                }else {
                  $totalsale = 0;
                  $totalcash = 0;
                  while($irow = $iresult->fetch_assoc()) {
                    $totalsale = $totalsale + $irow["invoice_total"];
                    $totalcash = $totalcash + $irow["invoice_paid"];

                 ?>
                  <tr>
                      <td><?php echo $irow["invoice_datetime"]; ?></td>
                      <td>#<?php echo $irow["invoice_id"]; ?></td>
                      <td>Tk.<?php echo $irow["invoice_total"]; ?></td>
                      <td>Tk.<?php echo $irow["invoice_paid"]; ?></td>
                      <td>Tk.<?php echo $irow["invoice_total"]-$irow["invoice_paid"]; ?></td>
                      <td>
                        <a href="invoice_details.php?invoice_id=<?php echo $irow["invoice_id"]; ?>" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="View Details">
                          <i class="material-icons">assignment</i> Details
                        </a>
                      </td>
                  </tr>
                <?php } } ?>
              </tbody>
          </table>
           <div class="col-md-12 text-center">
          <div class="brand">
            <h3>Total: Tk.<?php echo $totalsale; ?> &middot;|&middot; Cash: Tk.<?php echo $totalcash; ?>  &middot;|&middot; Due: Tk.<?php echo $totalsale-$totalcash; ?></h3>
          </div>
          </div>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>

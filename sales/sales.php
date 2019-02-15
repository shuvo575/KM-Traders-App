
  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Sales Report</h1>
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
              <form class="" action="sale_month.php" method="get">
              <div class="row">
                <div class="col-md-3 input-group">
                  <select class="form-control" name="year" required>
                    <option value="">Year</option>
                    <?php 

                    foreach (range(date('Y'), 2018) as $x) {
                        print '<option value="'.$x.'"'.'>'.$x.'</option>';
                      }

                     ?>
                  </select>
                </div>
                <div class="col-md-3 input-group">
                  <select class="form-control" name="month" required>
                    <option value="">Month</option>
                    <?php

                    for ($i = 0; $i < 12; $i++) {
                    $date_str = date('M', strtotime("$i months"));
                    echo "<option value='$date_str'>".$date_str ."</option>";

                    } ?>
                  </select>
                </div>
                <div class="col-md-3 input-group">
                  <select class="form-control" name="day">
                    <option value="">Day</option>
                    <?php
                      $days = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
                    foreach ($days as $day) {
                          echo "<option value=$day>$day</option>";
                      }

                     ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-primary btn-round float-right">
                    <i class="material-icons">assignment</i>    Get Report</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="brand">
                  <h2>Today's Sales</h2>
                </div>
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
                  $oDatabase= new Database();
                  $todays = date("jS M o");
                $isql = "SELECT * FROM invoice WHERE invoice_datetime LIKE '%$todays%'";
                $iresult = $oDatabase->fquery($isql);
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
                        <a href="invoice_details.php?invoice_id=<?php echo $irow["invoice_id"]; ?>" class="nav-link"/>
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
  <script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>

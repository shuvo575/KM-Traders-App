<?php
$oDatabase= new Database();
$sql = "SELECT * FROM shipment";
$result = $oDatabase->fquery($sql);
 ?>
  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Shipment List</h1>
          </div>
        </div>
        <div class="col-md-12">
          <a href="new_shipment.php" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Shipment">
            <i class="material-icons">playlist_add</i> </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="space-50"></div>
            <form class="" action="shipment_month.php" method="get">
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
                  <button class="btn btn-primary btn-round btn-sm float-right">
                    <i class="material-icons">assignment</i>    Get Report</button>
                </div>
              </div>
            </form>
            <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Total Price</th>
                      <th>Manage</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Total Price</th>
                      <th>Manage</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php
                while($row = $result->fetch_assoc()) { ?>
                  <tr>
                      <td><?php echo $row["shipment_id"]; ?></td>
                      <td><?php echo $row["shipment_datetime"]; ?></td>
                      <td><?php echo $row["shipment_total"]; ?></td>
                      <td>
                        <a href="shipment_details.php?shipment_id=<?php echo $row["shipment_id"]; ?>" class="brand">
                          <i class="material-icons">assignment</i> Details
                        </a>
                      </td>
                  </tr>
                  <?php } ?>
              </tbody>
          </table>
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
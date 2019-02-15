<?php
$oDatabase= new Database();
if(isset($_GET['year']))
  {
    $year = $_GET['year'];
    $month = $_GET['month'];
    $day = $_GET['day'];
  }
$sql = "SELECT * FROM shipment WHERE shipment_datetime LIKE '%$day $month $year%'";
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
                $totalvalue = 0;
                while($row = $result->fetch_assoc()) { 
                  $totalvalue = $totalvalue + $row["shipment_total"];

                  ?>
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
           <div class="col-md-12 text-center">
          <div class="brand">
            <h2>Total Value: Tk.<?php echo $totalvalue; ?></h2>
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
<?php
$oDatabase= new Database();
$sql = "SELECT * FROM customer_details WHERE customer_phone";
$result = $oDatabase->fquery($sql);
if ($result->num_rows === 0) {
  header('Location: index.php');
}else {
 ?>


  <div class="page-header header-filter" data-parallax="true" >

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Customers List</h1>
          </div>
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
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Due</th>
                      <th>Orders</th>
                      <th>Manage</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Due</th>
                    <th>Orders</th>
                    <th>Manage</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                  $due = 0;
                  $isql = "SELECT * FROM invoice WHERE customer_id ='$row[customer_id]'";
                  $iresult = $oDatabase->fquery($isql);
                  $torder = 0;
                  while($irow = $iresult->fetch_assoc()) {
                    $torder++;
                    $due = $due + $irow['invoice_total'] - $irow['invoice_paid'];


                  }

                 ?>
                  <tr>
                      <td><?php echo $row["customer_id"]; ?></td>
                      <td><?php echo $row["customer_name"]; ?></td>
                      <td><?php echo $row["customer_phone"]; ?></td>
                      <td><?php if ($due <=0) {
                        echo "Full Paid";
                      }else{ echo 'Tk.'.$due; } ?></td>
                      <td><?php echo $torder; ?></td>
                      <td>
                        <a href="customer_details.php?phone=<?php echo $row["customer_phone"]; ?>" class="btn-sm" >
                          <i class="material-icons">assignment</i> Details
                        </a>
                        <a href="new_order.php?phone=<?php echo $row["customer_phone"]; ?>" class="float-right btn-sm" >
                          <i class="material-icons">add</i> New Order
                        </a>
                      </td>
                  </tr>
                  <?php }
                    }
               ?>

              </tbody>
          </table>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>

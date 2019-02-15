<?php
$oDatabase= new Database();
$sql = "SELECT * FROM products WHERE product_id";
$result = $oDatabase->fquery($sql);
if ($result->num_rows === 0) {
  header('Location: products.php');
}else {
 ?>

  <div class="page-header header-filter" data-parallax="true">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Products List</h1>
          </div>
        </div>
        <div class="col-md-12">
          <a href="new_product.php" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Product">
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
                      <th>Name</th>
                      <th>Rate</th>
                      <th>Stock</th>
                      <th>Edit</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rate</th>
                    <th>Stock</th>
                    <th>Edit</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                  //echo "id: " . $row["customer_id"]. " - Name: " . $row["customer_name"]. " " . $row["customer_phone"]. "<br>";
                 ?>
                  <tr>
                      <td><?php echo $row["product_id"]; ?></td>
                      <td><?php echo $row["product_name"]; ?></td>
                      <td>TK. <?php echo $row["product_rate"]; ?></td>
                      <td>
                        <?php 

                        if ($row["product_quantity"] <= 0) {
                            echo "Out Of Stock";
                          }else{
                             echo $row["product_quantity"].' '.$row["product_unit"]; 
                         }
                       ?>
                         
                       </td>
                      <td><a href="edit_product.php?product_id=<?php echo $row["product_id"]; ?>" class="btn btn-primary btn-round btn-sm"/>
                      <i class="material-icons">border_color</i> </a></td>
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

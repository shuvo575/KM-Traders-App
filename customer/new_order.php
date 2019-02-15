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
  $sql = "SELECT * FROM products WHERE product_id";
  $result = $oDatabase->fquery($sql);
 ?>
  <div class="page-header header-filter" data-parallax="true">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1><?php echo "$row[customer_name]"; ?></h1>
            <h3>Phone: <?php echo "$row[customer_phone]"; ?> &middot; &middot; &middot; Address: <?php echo "$row[customer_address]"; ?></h3>
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
          <div class="col-md-12 text-center">
            <div class="brand">
              <h2>New Order</h2>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="space-50"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">calendar_today</i>
                  </span>
                </div>
                <input type="text" class="form-control datetimepicker" name="datetime" placeholder="Date & Time"/>
                <input type="hidden" name="hidden" value="new_order">
                <input type="hidden" name="customer_id" value="<?php echo "$row[customer_id]"; ?>">
              </div>
            </div>
            <div class="col-md-7"><div class="space-50"></div><h3>Product Name</h3></div>
            <div class="col-md-5"><div class="space-50"></div><h3>Quantity</h3></div>
            <table width="85%" id="ordertbl">
              <tr>
                <td width="65%">
                  <div class="col-md-12">
                    <div class="input-group">
                      <select class="form-control" name="product_id[]">
                        <option title="Rate" value="" >Choose Product</option>
                          <?php
                            while($row = $result->fetch_assoc()) {
                              if ($row["product_quantity"] != 0) {
                          ?>
                        <option title="<?php echo $row["product_rate"]; ?>" value="<?php echo $row["product_id"]; ?>"><?php echo $row["product_name"].' &ensp; &ensp; &ensp; (Rate: Tk.'.$row["product_rate"].' &ensp; Stock: '.$row["product_quantity"].$row["product_unit"].')'; ?></option>
                          <?php } } ?>
                      </select>
                    </div>
                  </div>
                </td>
                <td width="35%">
                  <div class="col-md-12">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">exposure_plus_1</i>
                        </span>
                      </div>
                      <input type="number" class="form-control" name="quantity[]" placeholder="Quantity"/>
                    </div>
                  </div>
                </td>
              </tr>
            </table>
            <div class="col-md-12">
              <div class="space-50"></div>
              <p onclick="tdeleteLastRow()" class="btn btn-danger btn-round float-left" rel="tooltip" title="" data-placement="bottom"   data-original-title="Delete Row">
                <i class="material-icons">remove_shopping_cart</i> </p>
              <p onclick="taddNewRow()" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Row">
                <i class="material-icons">add_shopping_cart</i> </p>
            </div>
            <div class="col-md-12 text-center">
              <div class="space-50"></div>
              <button class="btn btn-primary btn-round">
                <i class="material-icons">library_add</i> Add to Database
              </button>
            </div>
          </div>
          <div class="space-50"></div>
        </div>
      </div>
    </div>
  </form>


<script type="text/javascript">
    function taddNewRow() {
        var table = document.getElementById("ordertbl");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        cell1.innerHTML = table.rows[0].cells[0].innerHTML;
        cell2.innerHTML = table.rows[0].cells[1].innerHTML;
  
    }

    function tdeleteLastRow() {
      var table = document.getElementById("ordertbl");
      if (table.getElementsByTagName("tr").length >1) {
        table.deleteRow(-1);
      }else{
        alert("Stop! You can't delete all rows!!");
      }
    
    }

  </script>
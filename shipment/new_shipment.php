<?php
    $oDatabase= new Database();
    $sql = "SELECT * FROM products WHERE product_id";
    $result = $oDatabase->fquery($sql);
    

 ?>
  <div class="page-header header-filter" data-parallax="true">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>New Shipment Entry</h1>
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
                <input type="text" class="form-control" placeholder="Note" name="note">
                <input type="hidden" name="hidden" value="new_shipment">
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
                <input type="text" class="form-control datetimepicker" name="datetime" placeholder="Date & Time"/>
              </div>
            </div>
            <table id="shipmenttble" width="100%">
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
                      <select class="form-control" name="product_id[]">
                        <option value="" >Choose Product</option>
                          <?php
                            while($row = $result->fetch_assoc()) {
                          ?>
                        <option value="<?php echo $row["product_id"]; ?>"><?php echo $row["product_name"]; ?></option>
                          <?php } ?>
                      </select>
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
                      <input type="number" class="form-control" name="quantity[]" placeholder="Quantity"/>
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
                      <input type="number" class="form-control" name="rate[]" placeholder="Rate"/>
                    </div>
                  </div>
                </td>
              </tr>
            </table>
            <div class="col-md-12">
              <div class="space-50"></div>
              <p onclick="tdeleteLastRow()" class="btn btn-danger btn-round float-left" rel="tooltip" title="" data-placement="bottom"   data-original-title="Delete Row">
                <i class="material-icons">delete_sweep</i> </p>
              <p onclick="taddNewRow()" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Row">
                <i class="material-icons">add</i> </p>
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
        var table = document.getElementById("shipmenttble");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = table.rows[0].cells[0].innerHTML;
        cell2.innerHTML = table.rows[0].cells[1].innerHTML;
        cell3.innerHTML = table.rows[0].cells[2].innerHTML;
    }

    function tdeleteLastRow() {
      var table = document.getElementById("shipmenttble");
      if (table.getElementsByTagName("tr").length >1) {
        table.deleteRow(-1);
      }else{
        alert("Stop! You can't delete all rows!!");
      }
    
    }
  </script>

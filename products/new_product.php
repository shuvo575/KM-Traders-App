
  <div class="page-header header-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>New Products Entry</h1>
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
          <table id="protable" width="100%">
            <tr width="100%">
              <td width="60%">
                <div class="space-50"></div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">add_shopping_cart</i>
                      </span>
                    </div>
                  <input type="text" class="form-control" name="product" placeholder="Product Name" autocomplete="off" />
                  <input type="hidden" name="hidden" value="new_product">
                </div>
              </td>
              <td width="40%">
                <div class="space-50"></div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">ac_unit</i>
                      </span>
                    </div>
                  <input type="text" class="form-control" name="product_unit" placeholder="Unit Name: Kg/Bag" autocomplete="off" />
                </div>
              </td>
            </tr>
          </table>
           <!-- <div class="col-md-12">
              <div class="space-50"></div>
              <p onclick="tdeleteLastRow(protable)" class="btn btn-danger btn-round float-left" rel="tooltip" title="" data-placement="bottom"   data-original-title="Delete Row">
                <i class="material-icons">delete_sweep</i> </p>
              <p onclick="taddNewRow(protable)" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New Row">
                <i class="material-icons">add</i> </p>
            </div> -->
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
  

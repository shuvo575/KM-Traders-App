<?php
$oDatabase= new Database();
if(isset($_GET['product_id']))
  {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE product_id='$product_id'";
    $result = $oDatabase->fquery($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows === 0) {
      header('Location: products.php');
   }
  }else {
    header('Location: products.php');
  }

 ?>
  <div class="page-header header-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Edit Product</h1>
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
                  <input type="text" class="form-control" name="product" placeholder="Product Name" value="<?php echo "$row[product_name]"; ?>" autocomplete="off" />
                  <input type="hidden" name="hidden" value="update_product">
                  <input type="hidden" name="product_id" value="<?php echo "$row[product_id]"; ?>">
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
                  <input type="text" class="form-control" name="product_unit" placeholder="Unit Name" value="<?php echo "$row[product_unit]"; ?>" autocomplete="off" />
                </div>
              </td>
            </tr>
          </table>
            <div class="col-md-12 text-center">
              <div class="space-50"></div>
              <button class="btn btn-primary btn-round">
                <i class="material-icons">library_add</i> Update Product
              </button>
            </div>
          </div>
          <div class="space-50"></div>
        </div>
      </div>
    </div>
  </form>
  

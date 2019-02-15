<?php  session_start();
require_once('functions/function.php');

//===========================================================================================================
//User Login
  if(isset($_POST['hidden']) && $_POST['hidden'] ==='login')
    {
      $user = $_POST['username'];
      $pass = md5($_POST['pass']);
      $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass' AND status='1'";
      $result = $oDatabase->fquery($sql);
      if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $user;
        $_SESSION['userid'] = $row['user_id'];
        header('Location: index.php');
      }
    }
//===========================================================================================================

$oIslogged->check();
  

// new customer submit==========================================================================================
  if(isset($_POST['hidden']) && $_POST['hidden'] ==='new_customer')
    {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $cdatetime = $_POST['datetime'];
      $sql = "SELECT * FROM customer_details WHERE customer_phone='$phone'";
      $result = $oDatabase->fquery($sql);
      $row = $result->fetch_assoc();
      if ($result->num_rows === 0) {
        $sql = "INSERT INTO customer_details (customer_id, customer_name, customer_phone, customer_address, customer_datetime)
        VALUES ('','$name','$phone','$address','$cdatetime')";
        $oDatabase->squery($sql);
        header('Location: customer_details.php?phone='.$phone);
      }else {
        header('Location: customer_details.php?phone='.$phone);
      }
  }

// edit customer ====================================================================================================
  if(isset($_POST['hidden']) && $_POST['hidden'] ==='edit_cus')
    {
      $name = $_POST['name'];
      $customer_id = $_POST['customer_id'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $cdatetime = $_POST['datetime'];
      $sql = "SELECT * FROM customer_details WHERE customer_phone='$phone'";
      $result = $oDatabase->fquery($sql);
      $row = $result->fetch_assoc();
      if ($result->num_rows === 0) {
        $sql = "UPDATE customer_details SET customer_name='$name', customer_phone='$phone', customer_address='$address', customer_datetime='$cdatetime' WHERE customer_id='$customer_id'";
        $oDatabase->squery($sql);
        header('Location: customer_details.php?phone='.$phone);
        //echo "Not working";
      }else {
        header('Location: customer_details.php?phone='.$phone);
        //echo "Dublicate Found";
      }
  }


//Search at Home page ===============================================================================================


  if(isset($_POST['hidden']) && $_POST['hidden'] ==='search')
    {
      $search = $_POST['search'];
      $sql = "SELECT * FROM customer_details WHERE customer_phone='$search'";
      $result = $oDatabase->fquery($sql);
      if ($result->num_rows === 0) {
        header('Location: new_customer.php?phone='.$search);
     }else {

        //echo "$row[customer_name]";
        header('Location: customer_details.php?phone='.$search);

     }

  }


// New product Submit ==============================================================================================
  if(isset($_POST['hidden']) && $_POST['hidden'] ==='new_product')
    {
      $product = $_POST['product'];
      $product_unit = $_POST['product_unit'];
      $sql = "SELECT * FROM products WHERE product_name ='$product'";
      $result = $oDatabase->fquery($sql);
      if ($result->num_rows === 0) {
        $ssql = "INSERT INTO products (product_id, product_name, product_quantity, product_rate, product_unit)
        VALUES ('','$product','','', '$product_unit')";
        $oDatabase->squery($ssql);
        header('Location: products.php');
        //echo "Query Successfull";
      }else {
        header('Location: products.php');
        //echo "Dublicate Found";
      }
    
      //print_r($product);
      //echo $product[0];
  }


//Product Update ===================================================================================================
  if(isset($_POST['hidden']) && $_POST['hidden'] ==='update_product')
    {
      $product = $_POST['product'];
      $product_unit = $_POST['product_unit'];
      $p_id = $_POST['product_id'];
      $sql = "SELECT * FROM products WHERE product_name ='$product'";
      $result = $oDatabase->fquery($sql);
      if ($result->num_rows === 0) {
        $ssql = "UPDATE products SET product_name='$product', product_unit='$product_unit' WHERE product_id='$p_id'";
        $oDatabase->squery($ssql);
        header('Location: products.php');
        //echo $p_id."     ".$product;
      }else{
        header('Location: products.php');
        //echo "Dublicate Found";
      }
    }


//New Shipment Submit ===============================================================================================
    if(isset($_POST['hidden']) && $_POST['hidden'] ==='new_shipment')
    {
      $note = $_POST['note'];
      $datetime = $_POST['datetime'];
      $product_id = $_POST['product_id'];
      $quantity = $_POST['quantity'];
      $rate = $_POST['rate'];
      $sql = "INSERT INTO shipment (shipment_id, shipment_datetime, shipment_note, shipment_total)
        VALUES ('','$datetime','$note','')";
      $oDatabase->squery($sql);
      $sql = "SELECT * FROM shipment ORDER BY shipment_id DESC LIMIT 1";
          $result = $oDatabase->fquery($sql);
          $row = $result->fetch_assoc();
          $last_id = $row['shipment_id'];

      foreach( $product_id as $key => $id ) {
          $product_total = $quantity[$key] * $rate[$key];
          $sql = "INSERT INTO shipment_details (shipment_details_id, shipment_id, product_id, product_quantity, product_rate, product_total)
          VALUES ('','$last_id','$id','$quantity[$key]','$rate[$key]','$product_total')";
          $oDatabase->squery($sql);

          $sql = "SELECT * FROM products WHERE product_id ='$id'";
          $result = $oDatabase->fquery($sql);
          $row = $result->fetch_assoc();
          $newQuantity = $row['product_quantity'] + $quantity[$key];
          $ssql = "UPDATE products SET product_quantity='$newQuantity', product_rate='$rate[$key]'  WHERE product_id='$id'";
          $oDatabase->squery($ssql);
      }
      $sql = "SELECT * FROM shipment_details WHERE shipment_id ='$last_id'";
      $result = $oDatabase->fquery($sql);
      $total = 0;
      while($row = $result->fetch_assoc()) {
        $total = $total+$row['product_total'];
      }

      $ssql = "UPDATE shipment SET shipment_total='$total'  WHERE shipment_id='$last_id'";
      $oDatabase->squery($ssql);

      header('Location: shipment_details.php?shipment_id='.$last_id);
    }

//edit shipment==================================================================================================
    if(isset($_POST['hidden']) && $_POST['hidden'] ==='edit_shipment')
    {
      $note = $_POST['note'];
      $shipment_id = $_POST['shipment_id'];
      $product_id = $_POST['product_id']; //array
      $quantity = $_POST['quantity'];  //array
      $rate = $_POST['rate']; //array
      $ssql = "UPDATE shipment SET shipment_note='$note'  WHERE shipment_id='$shipment_id'";
      $oDatabase->squery($ssql);
      $subtotal = 0;
        foreach( $product_id as $key => $id ) {
          $psql = "SELECT * FROM shipment_details WHERE shipment_id ='$shipment_id' AND product_id='$id'";
          $presult = $oDatabase->fquery($psql);
          $prow = $presult->fetch_assoc();
          $pre_quantity = $prow['product_quantity'];
          $new_quantity = $quantity[$key];
          $product_total = $quantity[$key] * $rate[$key];
          $usql = "UPDATE shipment_details SET product_quantity='$quantity[$key]', product_rate='$rate[$key]', product_total='$product_total'  WHERE shipment_details_id='$prow[shipment_details_id]'";
          $oDatabase->squery($usql);
          $ppsql = "SELECT * FROM products WHERE product_id='$id'";
          $ppresult = $oDatabase->fquery($ppsql);
          $pprow = $ppresult->fetch_assoc();
          $stcquantity = $pprow['product_quantity'];
          $upquantity = $stcquantity - ($pre_quantity - $new_quantity);
          
          $ssql = "UPDATE products SET product_quantity='$upquantity', product_rate='$rate[$key]'  WHERE product_id='$id'";
          $oDatabase->squery($ssql);
          $subtotal = $product_total + $subtotal;

        }
      
        $qssql = "UPDATE shipment SET shipment_total='$subtotal'  WHERE shipment_id='$shipment_id'";
      $oDatabase->squery($qssql);
        header('Location: shipment_details.php?shipment_id='.$shipment_id);

    }








// New order ======================================================================================================
      if(isset($_POST['hidden']) && $_POST['hidden'] ==='new_order')
      {
      $customer_id = $_POST['customer_id'];
      $idatetime = $_POST['datetime'];
      $product_id = $_POST['product_id']; //array
      $quantity = $_POST['quantity']; //array
      $sql = "INSERT INTO invoice (invoice_id, customer_id, invoice_datetime, invoice_total, invoice_discount, invoice_paid)
        VALUES ('','$customer_id','$idatetime','','','')";
      $oDatabase->squery($sql);
      $sql = "SELECT * FROM invoice ORDER BY invoice_id DESC LIMIT 1";
          $result = $oDatabase->fquery($sql);
          $row = $result->fetch_assoc();
          $last_id = $row['invoice_id'];
          $subtotal = 0;
      foreach( $product_id as $key => $id ) {
          $sql = "SELECT * FROM products WHERE product_id ='$id'";
          $result = $oDatabase->fquery($sql);
          $row = $result->fetch_assoc();
          $rate = $row['product_rate'];
          $stoc_quantity = $row['product_quantity'];
          if ($stoc_quantity >= $quantity[$key]) {
            $add_quantity = $quantity[$key];
          }else{
            $add_quantity = $stoc_quantity;
          }
          $product_total = $rate * $add_quantity;
          $sql = "INSERT INTO invoice_details (invoice_details_id, invoice_id, product_id, product_quantity, product_rate, product_total)
          VALUES ('','$last_id','$id','$add_quantity','$rate','$product_total')";
          $oDatabase->squery($sql);
          $subtotal = $subtotal + $product_total;
          $newquantity = $stoc_quantity - $add_quantity;
          $pssql = "UPDATE products SET product_quantity='$newquantity'  WHERE product_id='$id'";
          $oDatabase->squery($pssql);

          
      }

      $ssql = "UPDATE invoice SET invoice_total='$subtotal'  WHERE invoice_id='$last_id'";
      $oDatabase->squery($ssql);
      //echo "Successfull";
      header('Location: invoice_details.php?invoice_id='.$last_id);
      
    }



    //Update order =================================================================================================

    if(isset($_POST['hidden']) && $_POST['hidden'] ==='update_order')
      {
      $invoice_id = $_POST['invoice_id'];
      $invoice_discount = $_POST['discount'];
      $invoice_datetime = $_POST['datetime'];
      $invoice_payment = $_POST['payment'];
      $product_id = $_POST['sproduct_id']; //array
      $quantity = $_POST['quantity']; //array
      $subtotal = 0;
      //print_r($product_id);
      //print_r($quantity);
      //echo "$id_id <br>";
      $idsql = "SELECT * FROM invoice_details WHERE invoice_id='$invoice_id' ORDER BY invoice_details_id ASC LIMIT 1";
          $idresult = $oDatabase->fquery($idsql);
          $idrow = $idresult->fetch_assoc();
          $id_id = $idrow['invoice_details_id'];
      foreach( $product_id as $key => $id ) {
          $sql = "SELECT * FROM products WHERE product_id ='$id'";
          $result = $oDatabase->fquery($sql);
          $row = $result->fetch_assoc();
          $rate = $row['product_rate'];
          $stoc_quantity = $row['product_quantity'];
          if ($stoc_quantity >= $quantity[$key]) {
            $add_quantity = $quantity[$key];
          }else{
            $add_quantity = $stoc_quantity;
          }
          $product_total = $rate * $add_quantity;
          $qidsql = "SELECT * FROM invoice_details WHERE invoice_details_id='$id_id'";
          $qidresult = $oDatabase->fquery($qidsql);
          $qidrow = $qidresult->fetch_assoc();
          $pre_quantity = $qidrow['product_quantity'];
          $upquantity = $stoc_quantity - ($pre_quantity - $add_quantity);
          $qssql = "UPDATE products SET product_quantity='$upquantity'  WHERE product_id='$id'";
          $oDatabase->squery($qssql);
          
          //echo "$id_id <br>";
          $idisql = "UPDATE invoice_details SET product_id='$id', product_quantity='$add_quantity', product_rate='$rate', product_total='$product_total' WHERE invoice_details_id='$id_id'";
          $oDatabase->squery($idisql);
          $subtotal = $subtotal + $product_total;
          $id_id = $id_id + 1;
          
      }

      

      if ($invoice_discount != '') {
        $subtotal = $subtotal - $invoice_discount;
     }
     $issql = "UPDATE invoice SET invoice_total='$subtotal', invoice_discount='$invoice_discount', invoice_paid='$invoice_payment'  WHERE invoice_id='$invoice_id'";
     $oDatabase->squery($issql);

      header('Location: invoice_details.php?invoice_id='.$invoice_id);

      
      
    }


    //Change password================================================================================================

    if(isset($_POST['hidden']) && $_POST['hidden'] ==='edit_pass')
      {
      $userid = $_POST['userid'];
      $oldpass = md5($_POST['oldpass']);
      $newpass = md5($_POST['newpass']);
      $rnewpass = md5($_POST['rnewpass']);

      if ($newpass === $rnewpass) {
        $sql = "SELECT * FROM user WHERE user_id='$userid' AND password='$oldpass' AND status='1'";
        $result = $oDatabase->fquery($sql);
        if ($result->num_rows === 0) {
          header('Location: user.php?msg=Password%20not%20matched!!');
         }else{ 
          $ssql = "UPDATE user SET password='$newpass' WHERE user_id='$userid'";
          $oDatabase->squery($ssql);
          header('Location: user.php?msg=Password%20Changed%20Successfully.');
         }
        
      }else{
        header('Location: user.php?msg=Please%20Repeat%20Same%20Password!');
      }



    }



// change USER status

    if(isset($_GET['hidden']) && $_GET['hidden'] ==='status')
      {
        $sql = "UPDATE user SET status='$_GET[sta]' WHERE user_id='$_GET[userid]'";
        $oDatabase->squery($sql);
        header('Location: user.php');
    }

// ADD new USER ===================================================================================================

    if(isset($_POST['hidden']) && $_POST['hidden'] ==='useradd')
      {
          $username = $_POST['username'];
          $newpass = md5($_POST['newpass']);
          $rnewpass = md5($_POST['rnewpass']);
          if ($newpass === $rnewpass) {
            $sql = "SELECT * FROM user WHERE username='$username'";
        $result = $oDatabase->fquery($sql);
        if ($result->num_rows === 0) {
            $ssql = "INSERT INTO user (user_id, username, password, status)
          VALUES ('','$username','$newpass','1')";
          $oDatabase->squery($ssql);
          header('Location: user.php?msg=User%20added%20successfully!');
        }else{
        header('Location: user.php?msg=Dublicate%20user%20found!');
        }
           }else{
          header('Location: user.php?msg=Please%20Repeat%20Same%20Password!');
           }
           
    }

echo "Invalid Request!";

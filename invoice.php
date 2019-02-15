<?php  session_start();
require_once('functions/function.php');
$oIslogged->check();
include('phpinvoice.php');
$oDatabase= new Database();
$invoice = new phpinvoice();
if(isset($_GET['invoice_id']))
  {
    $invoice_id = $_GET['invoice_id'];
    $sql = "SELECT * FROM invoice WHERE invoice_id='$invoice_id'";
    $result = $oDatabase->fquery($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows === 0) {
      header('Location: index.php');
   }
  }else {
    header('Location: index.php');
  }
    $customer_id = $row['customer_id'];
    $csql = "SELECT * FROM customer_details WHERE customer_id='$customer_id'";
    $cresult = $oDatabase->fquery($csql);
    $crow = $cresult->fetch_assoc();


/* Header Settings */
$invoice->setTimeZone('Asia/Dhaka');
$invoice->setLogo("assets/img/logoblack.png");
$invoice->setColor("#007fff");
$invoice->setType("Sale Invoice");
$invoice->setReference("INV-$invoice_id");
$invoice->setDate(date('M dS, Y', time()));
$invoice->setTime(date('h:i:s A', time()));
$invoice->setFrom(array("K.M. Traders", "Katiadi, Kishoregonj", "Phone: 01722214864", "Phone: 01722214864", "Bangladesh"));



$invoice->setTo(array("$crow[customer_name]", "Phone: $crow[customer_phone]", "$crow[customer_address]"));
/* Adding Items in table */
$idsql = "SELECT * FROM invoice_details WHERE invoice_id='$invoice_id'"; //invoice details sql
$idresult = $oDatabase->fquery($idsql);
while($idrow = $idresult->fetch_assoc()) {
    $psql = "SELECT * FROM products WHERE product_id ='$idrow[product_id]' ";
    $presult = $oDatabase->fquery($psql);
    $prow = $presult->fetch_assoc();
$invoice->addItem($prow['product_name'], $idrow[product_quantity] , $idrow[product_rate]); 	
                }

/* Add totals */
$invoice->addTotal("Total", $invoice->items_total);
$invoice->addTotal("Discount", $row[invoice_discount], false, true);
$invoice->addTotal("Paid", $row[invoice_paid], false, true);
$invoice->addTotal("Due", $invoice->GetGrandTotal(), true);
/* Set badge */
if ($row['invoice_total'] > $row[invoice_paid]) {
	$invoice->addBadge("Payment Due");
}else{
	$invoice->addBadge("Paid");
}

/* Add title */
$invoice->addTitle("");
/* Add Paragraph */
$invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");
/* Set footer note */
$invoice->setFooternote("K.M. Traders      System Developed By: Sohag Hasan");

/*Footer Image*/
$invoice->setFooterImage("assets/img/logoblack.png");

/* Render */
$invoice->render('example1.pdf', 'I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
?>
<?php session_start();

//Including Database configuration file.

$servername = "localhost";
$username = "makor4sha_root";
$password = "adgjmptw440";
$dbname = "makor4sha_kmtraders";

// Create connection
$con = MySQLi_connect($servername, $username, $password, $dbname);

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.

   $Name = $_POST['search'];

//Search query.

   $Query = "SELECT * FROM customer_details WHERE customer_name LIKE '%$Name%' OR customer_phone LIKE '%$Name%' LIMIT 5";

//Query execution

   $ExecQuery = MySQLi_query($con, $Query);

//Creating unordered list to display result.

   echo '

<ol style="margin-left: 30px;">

   ';

   while ($Result = MySQLi_fetch_array($ExecQuery)) {

       ?>
   <li onclick='fill("<?php echo $Result['customer_phone']; ?>")'>

   <a style="cursor: pointer; ">
       <?php echo $Result['customer_name']; ?>
     </a>
   <a style="cursor: pointer; margin-left: 20px;">
       <?php echo $Result['customer_phone']; ?>
     </a>
   </li>
   <?php

}}


?>

</ol>

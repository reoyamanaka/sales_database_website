<head>
  <title>Update Result</title>
    <link type = "text/css" href="css/sitedesign.css" rel="stylesheet"/>
<head>
<body>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){ //if I came from a post request
  $sql_connection_var=mysqli_connect("localhost", "your_username", "your_password");
  $sales_items = mysqli_select_db($sql_connection_var, "sales_database");

  $edit_id=mysqli_real_escape_string($sql_connection_var, $_POST["id_number"]);

  $edit_price=mysqli_real_escape_string($sql_connection_var, $_POST["price"]);

  $edit_status=mysqli_real_escape_string($sql_connection_var, $_POST["status"]);

  $edit_date_sold=mysqli_real_escape_string($sql_connection_var, $_POST["date_sold"]);

  $edit_payment_method=mysqli_real_escape_string($sql_connection_var, $_POST["payment_method"]);

  $array_form_date_edited=explode("-", $edit_date_sold);

  $month_of_date_sold=$array_form_date_edited[1];

  $day_of_date_sold=$array_form_date_edited[2];

  $rowSQL=mysqli_query($sql_connection_var, "SELECT MAX(id_number) AS max FROM sales_items");

  $row = mysqli_fetch_array($rowSQL);

  $largest_id = $row['max'];

  if(filter_var($edit_id, FILTER_VALIDATE_INT) == true){

    if($edit_id<=$largest_id and $month_of_date_sold<13 and $day_of_date_sold<32){

      $update_item=mysqli_query($sql_connection_var, "UPDATE sales_items SET price='$edit_price', status='$edit_status', date_sold='$edit_date_sold', payment_method='$edit_payment_method' WHERE id_number='$edit_id'");
      echo("<strong>Process Successcul.</strong><br><br>Item updated.</div>");
    } else{
      echo("Invalid entry. Check ID or date entered.");
    }
  }
  else{
    echo("Invalid entry.");
}
}
 ?>

 <form action="index.php" method="post">
   <br>
   <input type="submit" value="Go Back">
 </form>
</body>

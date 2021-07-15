<head>
  <title>Insert Item Result</title>
    <link type = "text/css" href="css/sitedesign.css" rel="stylesheet"/>
<head>
<body>
  <div class="container-1">
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){ //if I came from a post request
  $sql_connection_var=mysqli_connect("localhost", "your_username", "your_password");
  $sales_items = mysqli_select_db($sql_connection_var, "sales_database");

  $item=mysqli_real_escape_string($sql_connection_var, $_POST["item"]);
  $description=mysqli_real_escape_string($sql_connection_var, $_POST["description"]);
  $price=mysqli_real_escape_string($sql_connection_var, $_POST["price"]);
  $status=mysqli_real_escape_string($sql_connection_var, $_POST["status"]);
  $date_posted=mysqli_real_escape_string($sql_connection_var, $_POST["date_posted"]);
  $date_sold=mysqli_real_escape_string($sql_connection_var, $_POST["date_sold"]);
  $payment_method=mysqli_real_escape_string($sql_connection_var, $_POST["payment_method"]);

  $month_of_date_posted=mysqli_query($sql_connection_var, "SELECT EXTRACT(MONTH FROM '$date_posted')");
  $day_of_date_posted=mysqli_query($sql_connection_var, "SELECT EXTRACT(DAY FROM '$date_posted')");


  $month_date_posted=mysqli_fetch_array($month_of_date_posted);
  $day_date_posted=mysqli_fetch_array($day_of_date_posted);

/*
  $array_form_date_sold=explode("-", $date_sold);
  $month_of_date_sold=$array_form_date_sold[1];
  $day_of_date_sold=$array_form_date_sold[2];*/


  if($date_posted!=""){
    if($month_date_posted[0]!=null){
      $insertitems=mysqli_query($sql_connection_var, "INSERT INTO sales_items(id_number, Item,
      Description, Price, Status, Date_posted, Date_sold, Payment_Method) value(99999,'$item', '$description', '$price', '$status', '$date_posted',
      '$date_sold', '$payment_method')");

      $disable_autoincrement=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY id_number int");

      $drop_primary_key=mysqli_query($sql_connection_var, "ALTER TABLE sales_items DROP PRIMARY KEY");

      $temp_clear_id=mysqli_query($sql_connection_var, "UPDATE sales_items SET id_number = 0");

      $disable_autoincrement=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY id_number int");

      $drop_primary_key=mysqli_query($sql_connection_var, "ALTER TABLE sales_items DROP PRIMARY KEY");

      $update_id=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY COLUMN id_number int NOT NULL Primary Key auto_increment First");

      echo("<strong>Process Successful.</strong><br><br>Item inserted.");
    }
    else{
      echo("<strong>Error Encountered.</strong><br><br>There was an invalid entry.");
    }
  }

  else{
    echo("<strong>Error Encountered.</strong><br><br>Date posted cannot be blank.");
    }
}
?>

<form action="index.php" method="post">
  <br>
  <input type="submit" value="Go Back">
</form>
</div>
</body>

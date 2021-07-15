<head>
  <title>Delete Process Page</title>
    <link type = "text/css" href="css/sitedesign.css" rel="stylesheet"/>
<head>
<body>
  <div class="container-1">
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){ //if I came from a post request
  $sql_connection_var=mysqli_connect("localhost", "your_username", "your_password");
  $sales_items = mysqli_select_db($sql_connection_var, "sales_database");

  $delete_id=mysqli_real_escape_string($sql_connection_var, $_POST["id_number"]);

  $rowSQL=mysqli_query($sql_connection_var, "SELECT MAX(id_number) AS max FROM sales_items");

  $row = mysqli_fetch_array($rowSQL);

  $largest_id = $row['max'];

  if(filter_var($delete_id, FILTER_VALIDATE_INT) == true){

    if($delete_id<=$largest_id){

      $delete_item=mysqli_query($sql_connection_var, "DELETE FROM sales_items WHERE id_number='$delete_id'");

      $disable_autoincrement=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY id_number int");

      $drop_primary_key=mysqli_query($sql_connection_var, "ALTER TABLE sales_items DROP PRIMARY KEY");

      $temp_clear_id=mysqli_query($sql_connection_var, "UPDATE sales_items SET id_number = 0");

      $disable_autoincrement=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY id_number int");

      $drop_primary_key=mysqli_query($sql_connection_var, "ALTER TABLE sales_items DROP PRIMARY KEY");

      $update_id=mysqli_query($sql_connection_var, "ALTER TABLE sales_items MODIFY COLUMN id_number int NOT NULL Primary Key auto_increment First");

      echo("<strong>Process Successful.</strong><br><br>Item deleted.");
    } else{
      echo("<strong>Error Encountered.</strong><br><br>Invalid ID.");
    }
  }
  else{
    echo("<strong>Error Encountered.</strong><br><br>Invalid entry.");
}
}
 ?>
 <form action="index.php" method="post">
   <br>
   <input type="submit" value="Go Back">
 </form>
</div>
</body>

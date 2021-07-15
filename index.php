<head>
  <title>Database of Items Being Sold</title>
    <link type = "text/css" href="css/sitedesign.css" rel="stylesheet"/>
<head>
  <div class="topnav">
    <a href="delete.html">Delete</a>
    <a href="filtermain.html">Filter Listing</a>
    <a href="update.html">Update</a>
    <a href="insertForm.html">Insert</a>
    <a class="active" href="index.php">Complete Listing</a>
  </div>
<body>
<h2>Complete Listing</h2>
<?php

  $sql_connection_var=mysqli_connect("localhost", "your_username", "your_password");
  $sales_items=mysqli_select_db($sql_connection_var, "sales_database");

  $updateid=mysqli_query($sql_connection_var, "ALTER TABLE sales_items AUTO_INCREMENT = 1");

  $selecting_table=mysqli_query($sql_connection_var, "SELECT * FROM sales_items");

  echo("<table style='width:100%' border='1'>
          <tr>
              <th>ID</th>
              <th>Item</th>
              <th>Description</th>
              <th>Price</th>
              <th>Status</th>
              <th>Date posted</th>
              <th>Date sold</th>
              <th>Method of payment</th>
          </tr>");

  while($printing_table=mysqli_fetch_array($selecting_table)){
    echo("<tr>
      <td>".$printing_table["id_number"]."</td>
      <td>".$printing_table["item"]."</td>
      <td>".$printing_table["description"]."</td>
      <td>".$printing_table["price"]."</td>
      <td>".$printing_table["status"]."</td>
      <td>".$printing_table["date_posted"]."</td>
      <td>".$printing_table["date_sold"]."</td>
      <td>".$printing_table["payment_method"]."</td>
    </tr>");
}

echo("</table>");
?>

</body>

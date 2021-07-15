<head>
  <title>Filter by Date Sold</title>
    <link type = "text/css" href="css/sitedesign.css" rel="stylesheet"/>
<head>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){ //if I came from a post request
  $sql_connection_var=mysqli_connect("localhost", "your_username", "your_password");
  $sales_items=mysqli_select_db($sql_connection_var, "sales_database");

  $filtering_date_sold=mysqli_query($sql_connection_var, "SELECT * FROM sales_items ORDER BY CONVERT(date_sold, date) DESC");

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

  while($printing_table=mysqli_fetch_array($filtering_date_sold)){
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
echo("<h2>Listing Filtered by Date Sold (Most to Least Recent)</h2>");
echo("</table>");
}
 ?>
 <br>
 <form action="index.php" method="post">
   <input type="submit" value="Go Back">
 </form>

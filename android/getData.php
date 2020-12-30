<?php
include "connection.php";

if ($_POST['reportOf'] == "Orders") {
  $query = "SELECT fullname,email,p_name,orders.p_qty,orders.p_Uprice,total_price,day,month,year,time FROM users,product,orders WHERE users.id=orders.cust_id AND product.id=orders.p_id AND `month`='{$_POST['item']}' ORDER BY `orders`.`id` DESC;";
  $data = mysqli_query($connection, "$query");
  echo "
    <div class='panel-heading'>
                   List of Orders made In {$_POST['item']}
    </div>
    <div class='panel-body'>
      <table class='table table-striped table-hover' >
         <tbody>
           <thead>

            <tr>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Product name</th>
            <th>U.P</th>
            <th>Orded Qty</th>
            <th>Total PayOut</th>
            <th>Date</th>
            <th>Time</th>
        </tr>

    </thead>";


  while ($row = mysqli_fetch_array($data)) {
    @$total = $total + $row[5];
    echo " <tr>
            <td> $row[0] </td>
            <td>$row[1]</td>
            <td> $row[2]</td>
            <td> $row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[6]/$row[7]/$row[8]</td>
            <td>$row[9]</td>
        </tr>";
  }
  echo "
    <tr><td> </td>
        <td></td>
        <td> </td>
        <td></td>
        <td></td>
       
        <td colspan='2' align='center'><b>Total Income</b></td>
        <td><b>$total</b></td>
    </tr>
    </tbody>
    </table>
    </div>
    ";
} else {
  $query = "SELECT * FROM `product` WHERE shareholder_id='{$_POST['item']}'";
  $data = mysqli_query($connection, "$query");
  //select shoreholder name
  $nameSql = mysqli_query($connection, "SELECT shareholders.full_name FROM `shareholders`,`product` WHERE shareholders.id=product.shareholder_id AND shareholders.id='{$_POST['item']}'");
  $name = mysqli_fetch_array($nameSql);
  echo " <div class='panel-heading'>
   Products of $name[0]
</div>
<div class='panel-body'>
<table class='table table-striped table-hover' >
<tbody>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>unit_price</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Date</th>
                    </tr>
                  </thead>";
  while ($row = mysqli_fetch_array($data)) {
    echo " <tr>
                      <td>$row[1]</td>
                      <td>$row[2]</td>
                      <td>$row[3]</td>
                      <td>$row[4]</td>
                      <td>$row[7]</td>
                      <td>$row[8]</td>
                      <td>$row[9]</td>
                    </tr>";
  }
  echo "
    </tbody>
    </table>
    </div>
    ";
}

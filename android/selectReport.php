<?php
include "connection.php";
$item = $_POST['item'];
if ($item == "Orders") {
    $query = "SELECT DISTINCT `month` FROM `orders` ORDER BY `orders`.`id` DESC";

    $data = mysqli_query($connection, "$query");

    echo '
    <div class="panel-heading">
    List of Months
    </div>
    <div class="panel-body">
    <table class="table table-striped table-hover" >
    <tbody>';
    while ($row = mysqli_fetch_array($data)) {
        echo " <tr>
               <td onclick=getData('$row[0]')> $row[0] </td></tr>";
    }
    echo "
    </tbody>
    </table>
    </div>";
} else {
    $query = "SELECT DISTINCT shareholders.id,full_name FROM shareholders,product WHERE shareholders.id=product.shareholder_id  ORDER BY product.id DESC";

    $data = mysqli_query($connection, "$query");

    echo '
    <div class="panel-heading">
    List of ShareHolders
    </div>
    <div class="panel-body">
    <table class="table table-striped table-hover" >
    <tbody>';
    while ($row = mysqli_fetch_array($data)) {
        echo " <tr>
               <td onclick=getData('$row[0]')> $row[1] </td></tr>";
    }
    echo "
    </tbody>
    </table>
    </div>";
}

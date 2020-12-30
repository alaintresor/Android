<?php
include 'connection.php';
$query = "SELECT * FROM `product`";
$data = mysqli_query($connection, "$query");
$query2 = "SELECT * FROM `shareholders`";
$sql = "SELECT * FROM `authors`";

$data2 = mysqli_query($connection, "$query2");
$data3 = mysqli_query($connection, "$sql");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Farm Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <!-- Date Picker -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
  <!-- Gallery Lightbox -->
  <link href="assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Theme color -->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Talkapp</a> -->
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="home.php">Home</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li class="active"><a href="#">Products</a></li>
          <li><a href="shareholders.php">ShareHolders</a></li>
          <li><a href="reports.php">Reports</a></li>
          <li><a href="admin_change_password.php">modify password</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br> <br> <br> <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class=" col-md-8 col-sm-8 col-xs-12 ">
          <h4 class="header-line">Manage Products</h4>
          <div class="panel panel-info">
            <div class="panel-heading">
              List of Products
            </div>
            <div class="panel-body">

              <table class="table table-striped table-hover">
                <tbody>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>unit_price</th>
                      <th>Description</th>
                      <th>Category</th>
                    </tr>
                  </thead>
                  <?php while ($row = mysqli_fetch_array($data)) { ?>
                    <tr>
                      <td><?php echo $row[1]; ?></td>
                      <td><?php echo $row[2]; ?></td>
                      <td><?php echo $row[3]; ?></td>
                      <td><?php echo $row[4]; ?></td>
                      <td><?php echo $row[7]; ?></td>
                      <td align='right'><a href='edit_product.php?id=<?php echo $row[0]; ?>'> Edit</a></td>
                      <td align='right'> <a href='deleteProduct.php?id=<?php echo $row[0]; ?>'>Delete</a></td>
                    </tr>
                  <?php  }  ?>
                </tbody>
              </table>
              <img src="">
            </div>
          </div>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 ">
          <p>
            <h4 class=" header-line">Add New Product</h4>
          </p>
          <div class="panel panel-info">
            <div class="panel-heading">
              Product Info
            </div>
            <div class="panel-body">
              <form method="post" action="add_product.php" enctype='multipart/form-data'>

                <div class="form-group">
                  <label for="firstname">Product name:</label>
                  <input type="text" class="form-control" required='' name="name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                  <label for="firstname">Product Quantity:</label>
                  <input type="text" class="form-control" required='' name="qty" placeholder="Enter product qty">
                </div>
                <div class="form-group">
                  <label for="firstname">Product Unit price:</label>
                  <input type="text" class="form-control" required='' name="u_price" placeholder="Enter product U/P">
                </div>
                <div class="form-group">
                  <label for="firstname">Product Description:</label>
                  <textarea name="desc" class="form-control" placeholder="Enter Description"></textarea>

                </div>
                <div class="form-group">
                  <label for="firstname">Product Image:</label>
                  <input type="file" class="form-control" required='' name="file">
                </div>
                <div class="form-group">
                  <label for="gender">Status:</label>
                  <select class="form-control" name="status">
                    <option class="disabled">......</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>

                  </select>
                </div>
                <div class="form-group">
                  <label for="gender">Category:</label>
                  <select class="form-control" name="category">
                    <option class="disabled">......</option>
                    <option value="IMBOGA">IMBOGA</option>
                    <option value="IMBUTO">IMBUTO</option>
                    <option value="IBIRIBWA">IBIRIBWA</option>
                    <option value="AMATUNGO">AMATUNGO</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="gender">Owner Id:</label>
                  <select class="form-control" name="owner" id="ownerId" onchange="getOwner();">
                    <option class="disabled">......</option>
                    <?php
                    while ($row = mysqli_fetch_array($data2)) {
                      echo "<option>$row[0]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="gender">Owner Name:</label>
                  <select class="form-control" id="name">
                    <option class="disabled">......</option>

                  </select>

                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary from-control" value="Add" name="done">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>




    <div class="jumbotron text-center" style="margin-bottom:0">
      &copycopyright by Habineza Jean Pierre</p>
    </div>
    <script type="text/javascript">
      //get ownername for spicific owner
      const getOwner = () => {
        let item = $("#ownerId").val();

        $.ajax({
          url: "getName.php",
          method: "POST",
          data: {
            item
          },
          success: function(data) {

            $("#name").html(data);
            console.log(data);
          }
        })

      }
    </script>
</body>

</html>
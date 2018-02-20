<?php

//connecting to the database
$dsn = "mysql:host=localhost;dbname=discounter";
$username = 'root';
$password = null;
$conn = new PDO($dsn, $username, $password);

// get the data from the form
$product_id = filter_input(INPUT_POST, 'product_id');
$coupon_id = filter_input(INPUT_POST, 'coupon_id');

$query = "SELECT * FROM products WHERE id = :product_id";
$statement = $conn->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

$query = "SELECT * FROM coupons WHERE id = :coupon_id";
$statement = $conn->prepare($query);
$statement->bindValue(':coupon_id', $coupon_id);
$statement->execute();
$coupon = $statement->fetch();
$statement->closeCursor();

// var_dump($product);
// die();

$description = $product['description'];
$price = $product['price'];
$discount = $coupon['discount_percent'];

// calculate the discount and discount percent
$discountAmt = $price * ($discount / 100);
$discountPrice = $price - $discountAmt;

// apply currency formatting to the dollar and percent amounts
$listPriceF = "$".number_format($price, 2);
$discountPercentF = $discount."%";
$discountF = "$".number_format($discountAmt, 2);
$discountPriceF = "$".number_format($discountPrice, 2);

?>


<!DOCTYPE html>
<html>
<!-- Steven Phillips -->


<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="master.css">

<title>Product Discount Calculator</title>
</head>
<body>
<div class="container" style="height: 100vh">
  <div class="row align-items-center" style="height: 100%">
    <div class="col-3"></div>
    <div class="col-6">
      <div class="card">
          <div class="card-header">
            Product Discount Calculator
          </div>
          <div class="card-body">
            <form action="product.php" method="post">
              <div class="row">
                <div class="form-group col-7">
                    <label class="label-pad" for="pd-input">Product Description:</label><br>
                    <!-- <input class="form-control" type="text" name="product-description" id="pd-input"><br> -->
                    <label class="label-pad" for="lp-input">List Price:</label><br>
                    <!-- <input class="form-control" type="text" name="list-price" id="lp-input"><br> -->
                    <label class="label-pad" for="dp-input">Discount Percent:</label><br>
                    <!-- <input class="form-control" type="text" name="discount-percent" id="dp-input"><br> -->
                    <label class="label-pad" for="dp-input">Discount:</label><br>

                    <label class="label-pad" for="dp-input">Total:</label><br>
                  </div>
                  <div class="form-group col-5">

                    <div class="span-margin">
                      <span ><?php echo htmlspecialchars($description); ?></span><br>
                    </div>

                    <div class="span-margin">
                      <span><?php echo htmlspecialchars($listPriceF); ?></span><br>
                    </div>

                    <div class="span-margin">
                      <span><?php echo htmlspecialchars($discountPercentF); ?></span><br>
                    </div>

                    <div class="span-margin">
                      <span><?php echo htmlspecialchars($discountF); ?></span><br>
                    </div>

                    <div class="span-margin">
                      <span><?php echo htmlspecialchars($discountPriceF); ?></span><br>
                    </div>

                  </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

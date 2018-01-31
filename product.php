<?php
// get the data from the form
$description = filter_input(INPUT_POST, 'product-description');
$price = filter_input(INPUT_POST, 'list-price');
$discountPercent = filter_input(INPUT_POST, 'discount-percent');

// calculate the discount and discount percent
$discount = $price*discountPercent*.01;
$discountPrice = $price - $discount;

// apply currency formatting to the dollar and percent amounts
$listPriceF = "$".number_format($price, 2);
$discountPercentF = $discountPercent."%";
$discountF = "$".number_format($discount, 2);
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
                <div class="form-group col-6">
                    <label class="label-pad" for="pd-input">Product Description:</label><br>
                    <!-- <input class="form-control" type="text" name="product-description" id="pd-input"><br> -->
                    <label class="label-pad" for="lp-input">List Price:</label><br>
                    <!-- <input class="form-control" type="text" name="list-price" id="lp-input"><br> -->
                    <label class="label-pad" for="dp-input">Discount Percent:</label><br>
                    <!-- <input class="form-control" type="text" name="discount-percent" id="dp-input"><br> -->
                  </div>
                  <div class="form-group col-6">

                    <input class="form-control" type="text" name="product-description" id="pd-input"><br>

                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input class="form-control" type="text" name="list-price" id="lp-input"><br>
                    </div>

                    <div class="input-group mb-3">
                      <input class="form-control" type="text" name="discount-percent" id="dp-input"><br>
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>

                  </div>
              </div>
              <div id="buttons" style="padding-left:27%">
                <label for="submit-button">&nbsp;</label>
                <input class="btn btn-primary" type="submit" value="Calculate Discount"><br>
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

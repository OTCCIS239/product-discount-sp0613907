<?php

    //connecting to the database
      require_once('./db.php');

      //products table
      $query = "SELECT * FROM products WHERE in_stock > 0";
      $statement = $conn->prepare($query);
      //bind vars
      $statement->execute();
      $products = $statement->fetchAll();
      $statement->closeCursor();

      //coupons table
      $query = "SELECT * FROM coupons WHERE deleted_at IS NULL";
      $statement = $conn->prepare($query);
      $statement->execute();
      $coupons = $statement->fetchAll();
      $statement->closeCursor();

      // var_dump($coupons);
      // die();

  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Steven Phillips -->
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
                        <label class="label-pad" for="product_id">Product Description:</label><br>
                        <!-- <input class="form-control" type="text" name="product-description" id="pd-input"><br> -->
                        <!-- <label class="label-pad" for="lp-input">List Price:</label><br> -->
                        <!-- <input class="form-control" type="text" name="list-price" id="lp-input"><br> -->
                        <label class="label-pad" for="coupon_id">Discount Percent:</label><br>
                        <!-- <input class="form-control" type="text" name="discount-percent" id="dp-input"><br> -->
                      </div>
                      <div class="form-group col-6">

                        <!-- <input class="form-control" type="text" name="product-description" id="pd-input"><br> -->
                        <select name="product_id" id="product_id" class="form-control mb-4">
                            <?php foreach($products as $product): ?>
                                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?> - $<?= $product['price']?></options>
                            <?php endforeach ?>
                        </select>

                        <!-- <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input class="form-control" type="text" name="list-price" id="lp-input"><br>
                        </div> -->

                        <div class="input-group mb-3">
                          <!-- <input class="form-control" type="text" name="discount-percent" id="dp-input"><br> -->
                          <select name ="coupon_id" id="coupon_id" class="form-control mb-4">
                              <?php foreach($coupons as $coupons): ?>
                                      <option value="<?= $coupons['id'] ?>"><?= $coupons['code'] ?> - <?= $coupons['discount_percent'] ?>% Off</options>
                              <?php endforeach ?>
                          </select>
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

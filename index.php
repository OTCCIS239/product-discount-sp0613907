<!doctype html>
<html lang="en">
  <?php

      $products = [
          "Sour Patch Kids - 10lb",
          "Sour Skittles - 10lb",
          "Gummy Bears - 10lb",
          "Milky Way - 60 bar",
          "Jolly Rancher - 1500pc"
      ];

      $cupons = [
        10 => "Senior",
        20 => "Military",
        95 => "Adam E."
      ];

  ?>


  <head>
    <!-- Steven Phillips -->


    <!--TODO: 1.REPLACE DISCOUNT PERCENT WITH A DROPDOWN
              'CUPONS'.

              2.USE AND INDEX ARRAY WHERE THE
              INDECIES ARE THE PERCENTAGES.

              3.SEND THE PERCENTAGES TO THE NEXT PAGE  -->

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

                        <!-- <input class="form-control" type="text" name="product-description" id="pd-input"><br> -->
                        <select class="form-control mb-4">
                            <?php foreach($products as $product): ?>
                                    <option name="product-description" value="<?= $product ?>"><?= $product ?></options>
                            <?php endforeach ?>
                        </select>

                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input class="form-control" type="text" name="list-price" id="lp-input"><br>
                        </div>

                        <div class="input-group mb-3">
                          <!-- <input class="form-control" type="text" name="discount-percent" id="dp-input"><br> -->
                          <select class="form-control mb-4">
                              <?php foreach($cupons as $rate => $discount): ?>
                                      <option name="product-description" value="<?= $rate ?>% -<?= $discount ?>"><?= $rate ?>% -<?= $discount ?></options>
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

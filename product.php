<?php

$description = $_GET['description'];
$price = $_GET['price'];
$discount = $_GET['discount'];

$discountAmount = ($discount/100);
$totalPrice = $price - $discountAmount;

?>
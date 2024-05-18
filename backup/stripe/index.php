<?php 

require_once('vendor/autoload.php');

$prices=$_REQUEST['price']*100;

\Stripe\Stripe::setApiKey('sk_test_51NEtvTG9oYqJB8BXLQB0MU5tdNc0X5PpnOAIM61gmqFbatZtN4oYbtJXAQQkbis8azxjLkJY8z6ytA4dVLWCrgHr00YYEVzYXB');

// Create a price of $60 (6000 cents)
$price = \Stripe\Price::create([
  'unit_amount' => $prices,
  'currency' => 'usd',
  'product_data' => [
    'name' => 'Product Name',
  ],
]);

// Create a Checkout session with the price
$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [
    [
      'price' => $price->id,
      'quantity' => 1,
    ],
  ],
  'mode' => 'payment',
  'success_url' => 'http://localhost/fyp-project/stripe/success.php',
  'cancel_url' => 'http://localhost/fyp-project/stripe/error.php',
]);

// Redirect the user to the Checkout page
header("Location: " . $session->url);
exit();




?>
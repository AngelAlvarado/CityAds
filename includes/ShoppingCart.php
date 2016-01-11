<?php
require_once 'Product.php';

class ShoppingCart {

  private $order_id;

  private $products = [];

  private $discount;

  private $coupon;

  private $checkout;

  private $total;

  /**
   * @return mixed
   */
  public function getTotal() {
    $products = $this->getProducts;
    if(!$products){
      return;
    }
    foreach ($products as $product) {
      $this->total += $product->getQuantity() * $product->getPrice();
    }// end foreach
    return $this->total;
  }// end if

  function __construct($order_id){
    if(empty($order_id) ){
      throw new Exception;
    }
    $this->order_id = $order_id;
  }

  /**
   * @return array
   */
  public function getProduct($name) {
    return $this->products[$name];
  }


  /**
   * @return array
   */
  public function getProducts() {
    return $this->products;
  }

  /**
   * @param Product $products
   */
  public function setProduct($product) {
    $this->products += $product;
  }

  /**
   * @return mixed
   */
  public function checkoutStatus() {
    return $this->checkout;
  }

  /**
   * @param mixed $checkout
   */
  public function setCheckoutStatus($checkout) {
    $this->checkout = $checkout;
  }
}
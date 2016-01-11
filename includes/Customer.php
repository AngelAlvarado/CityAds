<?php
require_once 'ShoppingCart.php';
class Customer {
  private $customer_id;

  private $shopping_cart;

  function __construct($customer_id){
    $this->customer_id = $customer_id;
  }

  /**
   * @return mixed
   */
  public function getShoppingCart() {
    return $this->shopping_cart;
  }

  /**
   * @param mixed $shopping_cart
   */
  public function setShoppingCart(ShoppingCart $shopping_cart) {
    $this->shopping_cart = $shopping_cart;
  }
}
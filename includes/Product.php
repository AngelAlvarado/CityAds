<?php

class Product {

  private $price;

  private $name;

  public $weight = '10g';

  public  $size = '10x10m';

  public  $color = 'red';

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  private $quantity;

  function __construct($name){
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getQuantity() {
    return $this->quantity;
  }

  /**
   * @param mixed $quantity
   */
  public function setQuantity($quantity) {
    $this->quantity = $quantity;
  }

  /**
   * @return mixed
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @param mixed $price
   */
  public function setPrice($price) {
    $this->price = $price;
  }
}
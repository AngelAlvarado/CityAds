<?php
  require_once 'includes/Customer.php';
  require_once 'includes/ShoppingCart.php';
  require_once 'includes/Product.php';
  session_start();

  if(!isset($_SESSION['customer'])){
    echo 'No products';
    echo 'Go home';
    return;
  }// end if

  $customer = unserialize($_SESSION['customer']);
  $quantity = $_POST['quantity'];
  $customer->getShoppingCart()->getProduct($_GET['product'])->setQuantity($quantity);
  $_SESSION['customer'] = serialize($customer);

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="includes/css/prism.css">
  <script src="includes/js/prism.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <title>CityAds implementation via third party services (Google Tag Manager). Molanco</title>
</head>

<body>
<?php

  foreach ($customer->getShoppingCart()->getProducts() AS $product){
    $ids_productos[] = $product->getName();
    $cantidades_productos[] = $product->getQuantity();
  }

?>

  <!-- Google Tag Manager -->
  <script>
    dataLayer=[{
      'basket_products': '<?= implode(",",$ids_productos)?>',
      'basket_quantity':  '<?= implode(",",$cantidades_productos)?>'
    }];
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TSGSF7"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-TSGSF7');</script>
  <!-- End Google Tag Manager -->


  <h1 align="center">Shopping Cart</h1>

  <form action="checkout.php?click_id=115&utm_medium=cityads" method="post">


  <table align="center" border="1px" style="border:1px blue solid;">
    <thead style="background-color:#cbcbcb;">
    <tr>
      <th width="40%">Product</th>
      <th width="30%">Quantity</th>
      <th width="30%">Price</th>

    </tr>
    </thead>
    <tbody>
      <?php foreach ($customer->getShoppingCart()->getProducts() AS $product): ?>

        <tr>

          <td><?php echo "Product ". $product->getName() ;?></td>
          <td><?php echo $product->getQuantity(); ?></td>
          <td style="color:red"><?php echo $product->getPrice(); ?></td>

        </tr>
      <?php endforeach?>

    </tbody>
    </table>

    <table align="center">
      <thead>
        <tr>
          <th><a href="index.php">Add more products</a></th>
          <th><input type="submit" value="Checkout" id='pago_directo' class="pagos checkout"></th>
        </tr>
      </thead>
    </table>
  </form>

<section>
  <blockquote>CityAds Script embedded no matter any source ID.
    Note this script does not have to be embedded on Checkout, Product detail, nor Checkout and Thank You pages </blockquote>


  <pre>

    /* < ! [CDATA[*/
      // Página Basket
      var xcnt_basket_products = '<?= implode(",",$ids_productos); ?>; // Regresar los ID ́s de los productos separados por coma
      var xcnt_basket_quantity = '<?= implode(",",$cantidades_productos); ?>; // Regresar la cantidad de cada produto en el basket, separados por comma
    /* ] ] >*/
    (function(){
      var xscr = document.createElement( 'script' );
      var xcntr = escape(document.referrer); xscr.async = true;
      xscr.src = ( document.location.protocol === 'https:' ? 'https:' : 'http:' ) + '//x.cnt.my/async/track/?r=' + Math.random();
      var x = document.getElementById( 'xcntmyAsync' ); x.parentNode.insertBefore( xscr, x );
    }());
    See instructions on  <a href="#">GTM </a>
  </pre>

  <blockquote>An important step is to catch the GET parameter click_id and set it as cookie. Later on, it will be used on the Thank You / Checkout page.
    Catch click_id in any page. See instructions on  <a href="#">GTM </a></blockquote>
</section>
</body>
</html>

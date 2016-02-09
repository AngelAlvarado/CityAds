<?php
  require_once 'includes/ShoppingCart.php';
  require_once 'includes/Product.php';
  require_once 'includes/Customer.php';
  session_start();
  if(!isset($_SESSION['customer'])){
    echo 'No products';
    echo ' <a href="index.php">Go home</a>';
    return;
  }// end if
  $customer = unserialize($_SESSION['customer']);

?>
<html>
<body>
<?php
  $lista_backend = [];


  foreach ($customer->getShoppingCart()->getProducts() AS $product) {
    //foreach ($customer->getShoppingCart()->getProducts() AS $product){
    $ids_productos[] = $product->getName();
    $cantidades_productos[] = $product->getQuantity();
    //}
    $lista_backend []  = [
      'pid'=> $product->getName(),
      'pn' => 'Product '. $product->getName(),
      'up' => $product->getPrice(),
      'pd' => 0,
      'pc' => 'Categoria 1',
      'qt' => $product->getQuantity()
    ];
  }
  $order_id = 1;
  $payment_method = 'Pago directo';
  $currency = "MX";
  $basket = json_encode($lista_backend);
?>
  <!-- Google Tag Manager -->
  <script>
    dataLayer=[{
      'order_products': '<?= implode(",",$ids_productos)?>',
      'order_quantity':  '<?= implode(",",$cantidades_productos)?>',
      'order_id' : '<?=md5($order_id)?>', // Regresar el OrderID (de preferencia criptografiado en MD5)
      'order_total' : '<?= number_format((float)$customer->getShoppingCart()->getTotal(), 2, '.', '') ?>', // Regresar el valor total del pedido usando siempre PUNTO para separar decimales
      'customer_type' : 'N', //Clocar variable qeu contenga este dato, este valor es de ejemplo
      'payment_method' : '<?= $payment_method ?>',//Cloar variable qeu contenga este dato, este valor es de ejemplo
      'currency' : <?=  'MXN' ?>,//Clocar variable qeu contenga este dato, este valor es de ejemplo
      'coupon' : '<?= 0 ?>',//Clocar variable que contenga este dato, este valor es de ejemplo
      'discount': '<?= 0.0 ?>',
      'basket':'<?= $basket ?>'
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

 <h1> Thanks. </h1>
 <th><a href="index.php">Go home</a></th>
 <?php //session_destroy(); ?>

<section>


  <pre>

    /* < ! [CDATA[*/
      // Checkout Pages
      var xcnt_order_products = '<?= implode(",",$ids_productos); ?>; // Regresar los ID ́s de los productos separados por coma
      var xcnt_order_quantity = '<?= implode(",",$cantidades_productos); ?>; // Regresar la cantidad de cada produto en el basket, separados por comma
      var xcnt_order_id = '<?= $order_id ?>';
      var xcnt_order_total = '<?= number_format((float)$customer->getShoppingCart()->getTotal(), 2, '.', ''); ?>';
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

  <pre>
    script type="text/javascript" async="async"

    src="https://cityadspix.com/track/{<?= $order_id ?>}/ct/q2/c/<EM>24875</EM>?click_id=
    &customer_type=N
    &payment_method={<?= $payment_method ?>}
    &order_total={<?= number_format((float)$customer->getShoppingCart()->getTotal(), 2, '.', '') ?>}
    &currency={<?= $currency ?>}
    &coupon=0
    &discount=0
    &basket=<?= $basket; ?>
    &md=2">

    /script

    noscript

    <  img src="https://cityadspix.com/track/{<?= $order_id ?>}/ct/q2/c/24875?click_id=
    &customer_type=N
    &payment_method=<?= $payment_method ?>
    &order_total={<?= number_format((float)$customer->getShoppingCart()->getTotal(), 2, '.', '') ?>}
    &currency={<?= $currency ?>}
    &coupon=0
    &discount=0
    &basket=<?= $basket; ?> "
    width='1'
    height='1' >

    /noscript

    </pre>
</section>
</body>
</html>

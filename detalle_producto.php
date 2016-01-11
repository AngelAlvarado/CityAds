<?php
  require_once 'includes/ShoppingCart.php';
  require_once 'includes/Product.php';
  require_once 'includes/Customer.php';
  session_start();
  if(!isset($_SESSION['customer'])){
    //todo fix
    $customer = new Customer(rand(1,1000));
    $sc = new ShoppingCart(rand(1,1000));
    $customer->setShoppingCart(rand(1,1000));
    $_SESSION['customer'] = serialize($customer);
  }
  $customer = unserialize($_SESSION['customer']);
?>
<?php
  $product = new Product($_GET['product']);
  $product->setPrice($_GET['price']);
  $customer->getShoppingCart()->setProduct([$product->getName() => $product]);
  $_SESSION['customer'] = serialize($customer);
?>
<html>
<header>
  <title>CityAds implementation via third party services (Google Tag Manager, Shopify). Molanco Team</title>

</header>

<body>
<!--@see GTM docs -->
<script>
  dataLayer =[{'product_id': '<?php $product->getName()?>'}];
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TSGSF7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSGSF7');</script>
<!-- End Google Tag Manager -->

<h1 align="center">Product Detail</h1>

<table align="center" border="1px" style="border:1px blue solid;">
  <thead style="background-color:#cbcbcb;">
  <tr>
    <th width="40%">Product</th>
    <th width="60%">Description</th>
  </tr>
  </thead>
  <tbody>
    <tr>
    <td><div style="border:1px blue solid"><strong><?php echo 'Product ' . $product->getName(); ?></strong></div></td>
    <td><div><strong> Price:</strong> <strong style="color:red"><?php echo $product->getPrice(); ?></strong></div>
    <div style="border-top:1px black solid"><strong> Weight:</strong><?php echo $product->weight; ?></div>
    <div style="border-top:1px black solid"><strong> Size: </strong><?php echo $product->size; ?></div>
    <div style="border-top:1px black solid"><strong> Color: </strong><?php echo $product->color; ?></div>
    </td>
    </tr>
  </tbody>
</table>
<form action="carrito_compra.php?product=<?php echo $product->getName();?>&price=<?php echo $product->getPrice(); ?>" method="post">
  <div align="center">
    Quantity: <input type="text" name="quantity" ><br>
    <input type="submit" value="Add">
  </div>
</form>

<section>
  <blockquote>CityAds Script embedded no matter any source ID.
    Note this script does not have to be embedded on Checkout, Product detail, nor Checkout and Thank You pages </blockquote>


  <pre>
    /* < ! [CDATA[*/
      // Product detail page
      var xcnt_product_id = '<?= $product->getName()?>'; // Product ID
    /* ] ] >*/

    (function(){
      var xscr = document.createElement( 'script' );
      var xcntr = escape(document.referrer); xscr.async = true;
      xscr.src = ( document.location.protocol === 'https:' ? 'https:' : 'http:' ) + '//x.cnt.my/async/track/?r=' + Math.random();
      var x = document.getElementById( 'xcntmyAsync' ); x.parentNode.insertBefore( xscr, x );
    }());
    See instructions on  <a href="#">GTM </a>
  </pre>

  <blockquote>An important step is to catch the GET parameter click_id and set it as cookie. Later on, it will be used on the thank you page.
    Catch click_id in any page. See instructions on  <a href="#">GTM </a></blockquote>
</section>

</body>
</html>

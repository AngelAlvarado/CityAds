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
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="includes/css/prism.css">
  <script src="includes/js/prism.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <title>CityAds implementation via third party services (Google Tag Manager, Shopify). Molanco Team</title>

</header>

<body>
<!--@see GTM docs -->
<script>
  dataLayer =[{'product_id': '<?= $product->getName()?>'}];
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
<div data-role="page" id="pageone">
  <div data-role="popup" id="myPanel" data-position="right" >
    <h2>This is what the CityAds js code looks like</h2>
    <section>
      <blockquote>Note this script does not have to be embedded on Checkout, Product detail, nor Checkout and Thank You pages </blockquote>


      <pre><code class="language-js">
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

        </code></pre>

      <blockquote>Remember to verify in any page if the click_id is comming as a Parameter GET in the URL</a></blockquote>

    </section>
  </div>
  <div data-role="header">
    <h1>CityAds implementation via third party services (Google Tag Manager)</h1>
  </div>


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
      <input type="submit" value="Add Product to cart">
    </div>
  </form>
  <a href="#myPanel" data-rel="popup" class="ui-btn  ui-corner-all ui-btn-icon-right ui-shadow">See CityAds js code embedded in this page</a>

</div>

</body>
</html>

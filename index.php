<?php
  require_once 'includes/Customer.php';
  require_once 'includes/ShoppingCart.php';
  session_start();
  if(!isset($_SESSION['customer'])){
    /**
     * Using a fake UID
     */
    $customer = new Customer(1);
    $sc = new ShoppingCart(1);
    $customer->setShoppingCart($sc);
    $_SESSION['customer'] = serialize($customer);
  }// end if
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="includes/css/prism.css">
  <script src="includes/js/prism.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <title>CityAds implementation via third party services (Google Tag Manager). Molanco Team</title>
</head>

<body>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TSGSF7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSGSF7');</script>
<!-- End Google Tag Manager -->


<div data-role="page" id="pageone">
  <div data-role="popup" id="myPanel" data-position="right" >
    <h2>This is what the CityAds js code looks like</h2>
    <section>
      <blockquote>CityAds Script embedded no matter any source ID.
        Note this script does not have to be embedded on Checkout, Product detail, nor Checkout and Thank You pages </blockquote>


      <pre><code class="language-js">
        / * < ! [CDATA[ */
        /* ] ] > */
          (function(){
            var xscr = document.createElement( 'script' );
            var xcntr = escape(document.referrer); xscr.async = true;
            xscr.src = ( document.location.protocol === 'https:' ? 'https:' : 'http:' ) + '//x.cnt.my/async/track/?r=' + Math.random();
            var x = document.getElementById( 'xcntmyAsync' ); x.parentNode.insertBefore( xscr, x );
          }());

      </code></pre>

      <blockquote>An important step is to catch the GET parameter click_id and set it as cookie. Later on, it will be used on the thank you page.
        Catch click_id in any page. See instructions on  <a href="#">GTM </a></blockquote>

    </section>
  </div>

  <div data-role="header">
    <h1>CityAds implementation via third party services (Google Tag Manager)</h1>
  </div>

  <div data-role="main" class="ui-content">


    <table align="center" border="1px" style="border:1px blue solid;">
      <thead style="background-color:#cbcbcb;">
      <tr>
        <th width="30%">Product</th>
        <th width="30%">Price (MX)</th>
        <th width="20%">Add to cart</th>
        <th width="20%">See this product as One page Shopping Cart</th>
         </tr>
      </thead>
      <tbody>
      <tr>
      <td>Product 1</td>
      <td>100</td>
      <td><a href="detalle_producto.php?product=1&price=100">Add</a></td>
      <td><div align="center"><strong><a href="caso_especial.php?product=1&price=100">View</a></strong></div></td>

      <tr>
      <td>Product 2</td>
      <td>200</td>
      <td><a href="detalle_producto.php?product=2&price=200">Add</a></td>
      <td><div align="center"><strong><a href="caso_especial.php?product=2&price=200">View</a></strong></div></td>
      </tr>

      <tr>
      <td>Product 3</td>
      <td>300</td>
      <td><a href="detalle_producto.php?product=3&price=300">Add</a></td>
      <td><div align="center"><strong><a href="caso_especial.php?product=3&price=300">View</a></strong></div></td>
      </tr>
      <tr>
      <td>Product 4</td>
      <td>400</td>
      <td><a href="detalle_producto.php?product=4&price=400">Add</a></td>
      <td><div align="center"><strong><a href="caso_especial.php?product=4&price=400">View</a></strong></div></td>
      </tr>



    </tbody>
    </table>




    <a href="#myPanel" data-rel="popup" class="ui-btn  ui-corner-all ui-btn-icon-right ui-shadow">See backend Code</a>
    <a href="#myPanel" data-rel="popup" class="ui-btn  ui-corner-all ui-btn-icon-right ui-shadow">See GTM example</a>
  </div>
  <div data-role="footer">
    <h1>Team Molanco</h1>
  </div>

</div>
</body>
</html>

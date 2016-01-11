<?php
  require_once 'includes/Customer.php';
  require_once 'includes/ShoppingCart.php';
  session_start();
  if(!isset($_SESSION['customer'])){
    $customer = new Customer(1);
    $sc = new ShoppingCart(1);
    $customer->setShoppingCart($sc);
    $_SESSION['customer'] = serialize($customer);
  }// end if
?>
<html>
<head>
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

<h1 align="center">CityAds implementation via third party services (Google Tag Manager). Molanco Team</h1>
<table align="center" border="1px" style="border:1px blue solid;">
  <thead style="background-color:#cbcbcb;">
  <tr>
    <th width="30%">Producto</th>
    <th width="30%">Precio</th>
    <th width="20%">Adicionar al carrito</th>
    <th width="20%">Ver como caso especial</th>
     </tr>
  </thead>
  <tbody>
  <tr>
  <td>Product 1</td>
  <td>100</td>
  <td><a href="detalle_producto.php?product=1&price=100">Add to cart</a></td>
  <td><div align="center"><strong><a href="caso_especial.php?product=1&price=100">Especial</a></strong></div></td>

  <tr>
  <td>Product 2</td>
  <td>200</td>
  <td><a href="detalle_producto.php?product=2&price=200">Add to cart</a></td>
  <td><div align="center"><strong><a href="caso_especial.php?product=2&price=200">Especial</a></strong></div></td>
  </tr>

  <tr>
  <td>Product 3</td>
  <td>300</td>
  <td><a href="detalle_producto.php?product=3&price=300">Add to cart</a></td>
  <td><div align="center"><strong><a href="caso_especial.php?product=3&price=300">Especial</a></strong></div></td>
  </tr>
  <tr>
  <td>Product 4</td>
  <td>400</td>
  <td><a href="detalle_producto.php?product=4&price=400">Add to cart</a></td>
  <td><div align="center"><strong><a href="caso_especial.php?product=4&price=400">Especial</a></strong></div></td>
  </tr>



</tbody>
</table>


<section>
  <blockquote>CityAds Script embedded no matter any source ID.
    Note this script does not have to be embedded on Checkout, Product detail, nor Checkout and Thank You pages </blockquote>


  <pre>
    /* < ! [CDATA[*/
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

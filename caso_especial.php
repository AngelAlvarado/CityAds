<?php
  $cantidad = 1;
  $precio   = $_GET['price'];
  $producto = $_GET['product'];
  $lista_productos[]= array('product' => $producto, 'price' => $precio, 'quantity' => $cantidad, );

  $list = array();
  $order_total = 0;


  foreach ($lista_productos AS $valor){
    $list[$valor['product']] = $valor['quantity'];
    $order_total = $order_total+ $valor['price'];
  }


  $ids_productos = array_keys($list);
  $cantidades_productos = array_values($list);
  $order_id = rand();
  $descuento = 0;

 $ar =json_encode($lista_productos);
 $ar = str_replace(",", "/", $ar);
 setrawcookie('carrito',$ar);

?>
<html>
<head>
<meta charset="UTF-8">
<title>CityAds implementation via third party services (Google Tag Manager). Molanco Team</title>
<script>
  dataLayer =[{'product_id': '<?= $producto?>'}];
</script>
</head>

<body>

<?php
$lista_backend = array();
foreach ($lista_productos AS $valor){
       $lista_backend []  = array(
       'pid'=>$valor['product'],
       'pn' =>'Product '.$valor['product'],
       'up' => $valor['price'],
       'pd'=>0,
       'pc'=>'Category 1',
       'qt'=>$valor['quantity']

       );
}

$basket = json_encode($lista_backend);

?>


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

<table align="center" border="1px" style="border:1px blue solid;">
  <thead style="background-color:#cbcbcb;">
  <tr>
    <th width="40%">Product</th>
    <th width="60%">Description</th>

  </tr>
  </thead>
  <tbody>
    <tr>
    <td><div style="border:1px blue solid"><strong><?php echo 'Product '.$_GET['product']?></strong></div></td>
    <td><div><strong> Price:</strong> <strong style="color:red"><?php echo $_GET['price']?></strong></div>
    <div style="border-top:1px black solid"><strong> Weight:</strong>10g</div>
    <div style="border-top:1px black solid"><strong> Size: </strong>15x15 cm</div>
    <div style="border-top:1px black solid"><strong> Color: </strong>Red</div>
    </td>
    </tr>
  </tbody>
</table>
<form action="thankyou.php?product=<?= $producto?>&price=<?= $precio?>" method="post">
    <div align="center">
	  <input type="submit" value="Checkhout" id='pago_directo' class="pagos checkout"
			onclick="function (){
					  dataLayer.push({
						'order_products': '<?= implode(",",$ids_productos)?>',
						'order_quantity':  '<?= implode(",",$cantidades_productos)?>',
						'order_id' : '<?=md5($order_id)?>', // Regresar el OrderID (de preferencia criptografiado en MD5)
						'order_total' : '<?=number_format((float)$order_total, 2, '.', '') ?>', // Regresar el valor total del pedido usando siempre PUNTO para separar decimales
						'customer_type' : 'Type 1', //Clocar variable qeu contenga este dato, este valor es de ejemplo
						'payment_method' : 'Pago directo',//Cloar variable que contenga este dato, este valor es de ejemplo
						'currency' : 'MX',//Clocar variable qeu contenga este dato, este valor es de ejemplo
						'coupon' : '<?= rand()?>',//Clocar variable que contenga este dato, este valor es de ejemplo
						'discount': '<?=number_format((float)$descuento, 2, '.', '') ?>',
						'basket':'<?= $basket?>'
					  });
		  }">
	</div>
</form>

 <blockquote>In this case, this page is both detail page and checkout page</blockquote>
 
<section>
  <blockquote>CityAds Script embedded no matter any source ID.
     Note that in this situation, this script have to be embedded on Checkout- Product detail page </blockquote>


  <pre>
    /* < ! [CDATA[*/
      // Product detail page
      var xcnt_product_id = '<?= $producto?>'; // Product ID
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

<section>


  <pre>

    /* < ! [CDATA[*/
      // Checkout Pages
      var xcnt_order_products = '<?= implode(",",$ids_productos); ?>; // Regresar los ID ́s de los productos separados por coma
      var xcnt_order_quantity = '<?= implode(",",$cantidades_productos); ?>; // Regresar la cantidad de cada produto en el basket, separados por comma
      var xcnt_order_id = '<?= $order_id ?>';
      var xcnt_order_total = '<?=number_format((float)$order_total, 2, '.', '') ?>';
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

    src="https://cityadspix.com/track/{<?= $order_id ?>}/ct/q2/c/<EM>24875</EM>?click_id={click_id}
    &customer_type={N}
    &payment_method={<?php echo 'Pago directo' ?>}
    &order_total={<?=number_format((float)$order_total, 2, '.', '') ?>}
    & currency={<?php echo 'MXN' ?>}
    &coupon=0
    &discount=0.00
    &basket=<?= $basket; ?>
    &md=2">

    /script>

    noscript>

    <  img src="https://cityadspix.com/track/<?= $order_id ?>/ct/q2/c/24875?click_id={click_id}
    &customer_type={N}
    &payment_method=<?= 'Pago directo' ?>
    &order_total={<?=number_format((float)$order_total, 2, '.', '') ?>}
    & currency={<?php echo 'MXN' ?>}
    &coupon=0
    &discount=0.00
    &basket=<?= $basket; ?> "
    width='1'
    height='1' >

    /noscript>
    </pre>
	
</section>
</body>
</html>


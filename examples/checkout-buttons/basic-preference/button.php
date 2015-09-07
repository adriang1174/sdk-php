<?php
require_once "../../../lib/mercadopago.php";


if (!empty($_REQUEST['precio']))
{
	$mp = new MP("1362883408014966", "bZCd0dFXDFFN26CR2kAml3I7kLoJx6cK");
	
	$preference_data = array(
	    "items" => array(
	        array(
	            "title" => "Aca va el texto de la descripcion de lo que se está pagando",
	            "currency_id" => "ARS",
	            "category_id" => "Category",
	            "quantity" => 1,
	            "unit_price" => $_REQUEST['precio']
	        )
	    )
	);
	
	$preference = $mp->create_preference($preference_data);
	header("Location: ". $preference["response"]["sandbox_init_point"]);
}
?>

<!doctype html>
<html>
    <head>
        <title>MercadoPago SDK - Create Preference and Show Checkout Example</title>
    </head>
    <body>
    	<form action="" method="post">
    		<input type="text" name="precio" id="precio />
    		<button type="submit" class="orange-ar-m-sq-arall">Pagar</button>
    	</form>
<!--       	<a href="<?php echo $preference["response"]["sandbox_init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pay</a> -->
        <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    </body>
</html>

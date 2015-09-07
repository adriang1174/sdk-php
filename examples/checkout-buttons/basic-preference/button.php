<?php
require_once "../../../lib/mercadopago.php";


if (!empty($_REQUEST['precio']))
{
	$precio = $_REQUEST['precio'] + 0.0;
	$mp = new MP("1362883408014966", "bZCd0dFXDFFN26CR2kAml3I7kLoJx6cK");
	
	$preference_data = array(
	    "items" => array(
	        array(
	            "title" => "Aca va el texto de la descripcion de lo que se está pagando",
	            "currency_id" => "ARS",
	            "category_id" => "Category",
	            "quantity" => 1,
	            "unit_price" => $precio
	        )
	    )
	);
	try{
			$preference = $mp->create_preference($preference_data);
		}
		catch(e){
		print_r(e);
		exit;
		}
	header("Location: ". $preference["response"]["sandbox_init_point"]);
}

?>

<!doctype html>
<html>
    <head>
        <title>MercadoPago SDK - Create Preference and Show Checkout Example</title>
    </head>
    <body>
    	<form action="button.php" method="post">
    		<input type="text" name="precio" id="precio" />
    		<input type="submit" name = "MP-Checkout" class="orange-ar-m-sq-arall" value="Pagar">
    	</form>
<!--       	<a href="<?php echo $preference["response"]["sandbox_init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pay</a>  -->
        <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    </body>
</html>

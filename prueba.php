<!DOCTYPE html>
<?php 
	include "./php/classes/ShowProduct.php"; 
	$producto = new ShowProduct();
	echo "Id: " . $producto->getIdProduct();
    echo "<br>";
	echo "Nombre: " . $producto->getNameProduct();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
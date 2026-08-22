<?php
$sprintf = [
 //Encadena el texto
["Hola %s\n", "Mundo"],
//Lo fuerza a enterpretar como entero
 ["%d\n ", 5.98765789087657897686],
 //Lo trata como flotante y lo fija a la candiad de %.algof\n
["%.3f\n", 70.99],
//añade ceros a la izquierda hasta completar el tamaño del campo
["%07d\n", 1],
//redondea el numero dado a la cantidad de decimales que se le indique
["%.2f\n", 3.14159265358979323846],

];


 function emparejar( array ...$datosString) : string
{
    $result = [];
    foreach($datosString as $data){ 


        $result[] = sprintf(...$data); 
    }
    return implode("|", $result);
}

//Ejercicio

$producto = [

['nombre' => 'Teclado', 'cantidad' => 3, 'precio' => 450.5],
['nombre' => 'Mouse', 'cantidad' => 2, 'precio' => 199.99],
['nombre' => 'Monitor', 'cantidad' => 1, 'precio' => 3200],
];
 $totalcadaProducto = [];
 $productos = function (array $producto,$totalcadaProducto ): array
{
 
   
    foreach($producto as $item){
        $totalcadaProducto[] = $item['cantidad'] * $item['precio'];
    }
    return $totalcadaProducto;


}


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Manipulación de Strings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet">
</head>
<body>
  <h1>-Ejemplos de sprintf</h1>
  <p><?= "[" .emparejar(...$sprintf) . "]" ?></p>
  <p><?php


//Argumentos posicionales
echo "[" .sprintf("%2\$d tiene %1\$s años\n", "Juan", 30) . "|" ;
echo sprintf("%2\$d es la edad de %1\$s\n", "Alex", 29) . "]";
?>
</p>
<h2>Ejercicio</h2>

<p white-space: pre><?php
echo sprintf("El producto %-12s tiene un cantidad de %3d y su precio es de $%10.2f, y el precio total es de $%10.2f", $producto[0]['nombre'], $producto[0]['cantidad'], $producto[0]['precio'],$productos($producto,$totalcadaProducto)[0]) . "<br>";
echo sprintf("El producto %-12s tiene un cantidad de %3d y su precio es de $%10.2f, y el precio total es de $%10.2f", $producto[1]['nombre'], $producto[1]['cantidad'], $producto[1]['precio'],$productos($producto,$totalcadaProducto)[1]) . "<br>";
echo sprintf("El producto %-12s tiene un cantidad de %3d y su precio es de $%10.2f, y el precio total es de $%10.2f", $producto[2]['nombre'], $producto[2]['cantidad'], $producto[2]['precio'],$productos($producto,$totalcadaProducto)[2]) . "<br>";
echo sprintf(" total: $%10.2f", array_sum($productos($producto,$totalcadaProducto))) . "<br>";
?></p>


</body>
</html>


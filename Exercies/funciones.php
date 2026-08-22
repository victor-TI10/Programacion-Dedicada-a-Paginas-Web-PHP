<?php
declare(strict_types=1);


#Funcion normal

function holaMundo( string $saluda): string
{
    return "!". $saluda;
}

#Funcion anónima

$holaMundo2 = function (string $saluda): string {
    return "!". $saluda;
};

#Arrow funcions
$arrow = fn (int $numero): int => $numero * 2;

#closure
$impuesto = 0.21;
$comicion = 0.10;

$calcularPrecioConImpuesto = function (float $precio) use ($impuesto, $comicion): float {
    return $precio + ($precio * $impuesto + $comicion);
};
# Parámetros por referencia  
//devuelbe
function duplicar (int &$numero): int {
    
return $numero * 2;
}
$valor = 10;
$duplicado = duplicar($valor);

//no devuelve

function duplicar2 (int $numero): void {
    
 $numero *= 2;
}
$valor1 = 18;
duplicar2($valor1);

#variadic

function juntartodos (string ...$nombres): string {
    return implode("|", $nombres);
}

#Funciones nullable type hint

function buscarUsuario (int $id, array $usuarios): ?string {
    
     if (isset($usuarios[$id]))  {

        return $usuarios[$id];
     }
     else {
        return "usuario no encontrado";
     }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio Día 2 funciones</title>
</head>
<body>
<h1>Ejercicio Día 2</h1>

<hgroup>
    <h2>Funciones anonimas </h2>
<p><?= holaMundo("Hola, mundo!") ?></p>
<p><?= $holaMundo2("Hola, a todos!") ?></p>
</hgroup>

<hgroup>
<h2>Funciones flecha</h2>
    <p><?= 'numero: ' . $arrow(8) ?></p>
</hgroup>


<hgroup>
<h2>Funciones closure</h2>
    <p><?= 'precio con impuesto mas comisión: ' . $calcularPrecioConImpuesto(200) ?></p>
</hgroup>

<hgroup>
<h2>Funciones con parámetros por referencia</h2>
    <p><?= 'numero duplicado con referencia: ' . $duplicado ?></p>
   <p><?= 'numero duplicado sin referencia: ' .$valor1 ?></p>
</hgroup>

<hgroup>
<h2>Funciones variadic</h2>
    <p><?= 'nombres: ' . juntartodos("Juan", "Pedro", "Maria", "Ana","Tu puta madre 17") ?></p>
</hgroup>

<hgroup>
    <h2>Funciones nullable type hint ?  </h2>
    <p><?= 'Encontrar usuario: ' . buscarUsuario(2, [ "Juan", "Pedro", "Maria","Victor"]) ?></p>

</hgroup>

</body>
</html>
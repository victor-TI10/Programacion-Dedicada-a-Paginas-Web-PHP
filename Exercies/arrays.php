<?php
#arrays

//Indexado array
$frutas = array("Manzana", "Banana", "Cereza", "pera");
//asociativo array
$persona = array("Juan" => 25, "Ana" => 30, "Pedro" => 35);

//array_map
 $precios = [100, 200, 300];
$preciosIva = array_map(fn(float $precio): float => $precio * 1.21, $precios);

//array_filter
$numeros = [0, 2, 3, 4, -4, 6, 7, -8, 9, -7];
$negativos = array_filter($numeros, fn(int $numero): bool => $numero <= 0);

//array_reduce
$pesoHarina = [100, 200, 95, 49, 51];
$pesoTotal = array_reduce($pesoHarina, fn(int $acumulador, int $pesogm): float => $acumulador + $pesogm, 0);

//usort

$productos = [
    ["nombre" => "mancuernas", "precio" => 700.99],
    ["nombre" => "barras", "precio" => 7000.00],
     ["nombre" => "anilllas", "precio" => 750],
      ["nombre" => "proteina", "precio" => 1500],
       ["nombre" => "audifonos", "precio" => 400],
        ["nombre" => "bolsa", "precio" => 888.99],
         ["nombre" => "pres de sentadilla", "precio" => 1000],
          ["nombre" => "cinturon", "precio" => 5000],
           ["nombre" => "cuerda", "precio" => 300],
            ["nombre" => "barras de traccion", "precio" => 2000],
             ["nombre" => "barras de paralelas", "precio" => 1500]
];

#ordenar por precio descendente
usort($productos, fn($a, $b) => $b['precio'] <=> $a['precio']);

//array_walk
$nombres = ["victor", "ana", "pedro", "carlos"];
$nombresOriginales = $nombres;

array_walk($nombres, function(string &$nombre): void {
    $nombre = ucfirst($nombre);
});

//Spread operator
$primeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$segundos = [11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

$todosNumeros = [...$primeros, ...$segundos];


//destructuring

$coords =[5030.72, - 4.71];
[$lantidud, $longitud] = $coords;


$usuario = [
    "nombre" => "Victor",
    "apellido" => "Gonzalez",
    "edad" => 30,
    "ciudad" => "Madrid"
];

['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad, 'ciudad' => $ciudad] = $usuario;

?>
<html>
    <head>
        <title>Ejercicios Arrays</title>
    </head>
    <body>
       <header>
            <h1>Arrays</h1>
        </header>
   <hgroup>
       <h2>Array Indexado</h2>
           <p><?= implode(", ", $frutas) ?></p>
           
           
           <h2>Array Asociativo</h2>
           
               <?php foreach($persona as $nombre => $edad): ?>
                   <p><?= $nombre ?>: <?= $edad ?></p>
               <?php endforeach; ?>
           
   </hgroup>
   <hgroup>

   <h2>Array Map</h2>
         <?php foreach($preciosIva as $precio): ?>
             <p> con IVA: <?= $precio ?></p>
         <?php endforeach; ?>
   </hgroup>

     <hgroup>

   <h2>Array Filter</h2>
         <?php foreach($negativos as $numero): ?>
             <p> Negativos: <?= $numero ?></p>
         <?php endforeach; ?>
   </hgroup>

    <hgroup>

   <h2>Array Reduce</h2>
     <p> Pesos por GM: <?= implode(", ", $pesoHarina) ?></p>
         <p> Peso Total: <?= $pesoTotal ?></p>
   </hgroup>

<hgroup>

    <h2>Array Usort</h2>
            <?php foreach($productos as $producto): ?>
                 <p> <?= $producto['nombre'] ?>:  $ <?= $producto['precio'] ?></p>
            <?php endforeach; ?>
            <p> Total: $ <?= array_reduce($productos, fn($acumulador, $producto) => $acumulador + $producto['precio'], 0) ?></p>
</hgroup>

  <hgroup>

   <h2>Array walk</h2>
     <p> Nombres: <?php echo implode(", ", $nombresOriginales) ?></p>
     <p> Nombres con mayuscula: <?= implode(", ", $nombres) ?></p>
   </hgroup>

    <hgroup>

   <h2>Array Spread operator</h2>
     <p> Números: <?= implode(", ", $todosNumeros) ?></p>
   </hgroup>

<hgroup>

    <h2>Array Destructuring</h2>
      
        
         <ul>   Array indexado</ul>
        <li>Latitud: <?= $lantidud ?></li>
        <li>Longitud: <?= $longitud ?></li>
        
    
        
            <ul>Array asociativo</ul>
            <li>nombre: <?= $nombre ?></li>
        <li>apellido: <?= $apellido ?></li>
        <li>edad: <?= $edad ?></li>
        <li>ciudad: <?= $ciudad ?></li>
        
</hgroup>

    </body>

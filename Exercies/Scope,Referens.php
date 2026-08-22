<?php

//Scope: global vs local

function singlobal(){
   echo isset($totals) ? "existe" : "no existe";
}
$totals = 10;  
function conglobal(){
   global $totals;
   echo $totals; ;
}


//static funciones
function examp (){
 static $a = 0;
  $a++;
echo $a . " ";
}


//match
$numero = [3,4,][array_rand([3,4,])]; 

$label = match($numero){
  1 => "activo",
  2 => "inactivo",
  3, 4=> "suspendido",
  default => "Numero desconocido"
};
#Comparación de tipos estricta

$nombre = "1";

$resultante = match($nombre){
  "1" => "es un nombre",
  1 => "es un número",
 
};

#sin valor de default = mensaje de error si no hay coincidencia
#try {
#$x = match(99){ 1 => "a"};
#} catch (UnhandledMatchError $e) {
#  echo "Error: No hay coincidencia ";
#}

//Nullsafe operator ?->

//Ejercicio en pausa para poder dominar POO en php.

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejercicios PHP 8</title>
</head>
<body>

<main>
  <pre contenteditable="false">
  Día 5 — Scope, referencias y tipos
Scope de variables, global vs local, static
<p>#variables globales.</p> 
<?php echo singlobal(); ?>

<?php echo conglobal(); ?>

<p>#variables estáticas.</p>
<?php echo examp(); echo examp(); echo examp(); ?>

<p>#match expresión </p>
<?php echo $label; ?>

<?php echo $resultante; //string?>

<?php try {
$x = match(99){ 1 => "a"};
} catch (UnhandledMatchError $e) {
    echo "Error: No hay coincidencia ";
}?>


</pre>
</main>
</body>
</html>





<style>
  :root {
    --bg: #1b1f24;
    --panel: #22272e;
    --border: #30363d;
    --text: #cdd6e0;
    --text-dim: #7d8794;
    --accent: #6f9dff;
    --mono: "Fira Code", "JetBrains Mono", ui-monospace, Menlo, Consolas, monospace;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    min-height: 100vh;
    background: var(--bg);
    color: var(--text);
    font-family: var(--mono);
    padding: 1rem;
  }

  main {
    max-width: 800px;
    margin: 0 auto;
  }

  pre {
    margin: 0;
    background: var(--panel);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 1.2rem 1.4rem;
    font-size: 0.9rem;
    line-height: 1.6;
    min-height: 400px;
    white-space: pre-wrap;
  }

  pre[contenteditable="true"] {
    outline: none;
  }

  pre[contenteditable="true"]:focus {
    border-color: var(--accent);
  }
</style>
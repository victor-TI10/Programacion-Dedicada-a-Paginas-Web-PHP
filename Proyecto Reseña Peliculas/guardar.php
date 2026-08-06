<?php
include("coneccion.php");

if (isset($_POST['enviar'])) {
    $nombrePelicula = trim($_POST['pelicula']);
    $anho           = trim($_POST['anio']);
    $resenha        = trim($_POST['resena']);
    $calificacion   = trim($_POST['calificacion']);
    $genero         = isset($_POST['genero']) ? implode(", ", $_POST['genero']) : "Sin genero";
    $nombreActor    = trim($_POST['actor']);
    $codigo         = isset($_POST['codigo_peli']) ? trim($_POST['codigo_peli']) : "00000";
    
    $recomienda     = ($_POST['recomienda'] == 'si') ? 'Altamente Recomendada' : 'No recomendada';
    $fecha          = date("d/m/Y H:i");

    $sql = "INSERT INTO datospeliculas 
            (`nombre de la pelicula`, anho, genero, nomActorPrincipal, resenha, calificacion, codigo) 
            VALUES ('$nombrePelicula', '$anho', '$genero', '$nombreActor', '$resenha', '$calificacion', '$codigo')";

    mysqli_query($conectar, $sql);

    $linea  = "========================================\n";
    $linea .= "Código Peli:  $codigo\n";
    $linea .= "Película:     $nombrePelicula ($anho)\n";
    $linea .= "Actor Principal: $nombreActor\n";
    $linea .= "Géneros:      $genero\n";
    $linea .= "Calificación: $calificacion/10\n";
    $linea .= "Veredicto:    $recomienda\n";
    $linea .= "Reseña:       $resenha\n";
    $linea .= "Fecha:        $fecha\n";
    
    $ruta_archivo = dirname(__FILE__) . "/resenas.txt";
    file_put_contents($ruta_archivo, $linea, FILE_APPEND);

    header("Location: procesar.php?peli=" . urlencode($nombrePelicula) . 
           "&anio=" . urlencode($anho) . 
           "&genero=" . urlencode($genero) . 
           "&resena=" . urlencode($resenha) . 
           "&calificacion=" . urlencode($calificacion) . 
           "&recomienda=" . urlencode($recomienda) . 
           "&fecha=" . urlencode($fecha) . 
           "&actor=" . urlencode($nombreActor) . 
           "&codigo=" . urlencode($codigo) . 
           "&guardado=ok");
    exit();
}
?>
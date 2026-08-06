<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Reseña - CineMundo</title>
    <link rel="stylesheet" href="complementos.css">
</head>
<body>

<?php 
    $peliSeleccionada = isset($_GET['peli']) ? htmlspecialchars($_GET['peli']) : ""; 
    $anioSeleccionado = isset($_GET['anio']) ? htmlspecialchars($_GET['anio']) : ""; 
    $idPeliSeleccionada = isset($_GET['codigo']) ? htmlspecialchars($_GET['codigo']) : "";
?>

<div class="container">
    <form id="formResena" name="resena" method="post" action="guardar.php">
        <fieldset>
            <legend>Nueva Reseña</legend>

            <input type="hidden" name="codigo_peli" value="<?php echo $idPeliSeleccionada; ?>">

            <label>Título de la película:</label>
            <input type="text" name="pelicula" value="<?php echo $peliSeleccionada; ?>" required>

            <label>Año de estreno:</label>
            <input type="number" name="anio" value="<?php echo $anioSeleccionado; ?>" required>

            <label>Actor Principal:</label>
            <input type="text" name="actor" placeholder="Ej. Leonardo DiCaprio" required>

            <label>Género (puedes elegir varios):</label>
            <select name="genero[]" multiple size="6">
                <option>Acción</option>
                <option>Aventura</option>
                <option>Comedia</option>
                <option>Drama</option>
                <option>Terror</option>
                <option>Ciencia Ficción</option>
                <option>Animación</option>
                <option>Suspenso</option>
            </select>

            <label>Calificación (1 al 10):</label>
            <input type="range" name="calificacion" min="1" max="10" value="5" oninput="this.nextElementSibling.value = this.value">
            <output>5</output>

            <label>¿La recomiendas?</label>
            <div class="radio-group">
                <input type="radio" name="recomienda" value="si" checked> Sí
                <input type="radio" name="recomienda" value="no"> No
            </div>

            <label>Tu Reseña:</label>
            <textarea name="resena" rows="5" placeholder="Escribe aquí tu opinión sobre la película..."></textarea>

            <button type="submit" name="enviar">Publicar Reseña</button>
              <a href="index.html" style="display:block; text-align:center; margin-top:15px; color:var(--primary); text-decoration:none; font-weight:bold;">← Volver a la Cartelera</a>
        </fieldset>
    </form>
</div>

<?php
if (isset($_GET['guardado']) && $_GET['guardado'] == 'ok') {
    $titulo       = htmlspecialchars($_GET['peli']);
    $anio         = htmlspecialchars($_GET['anio']);
    $generos      = htmlspecialchars($_GET['genero']);
    $resena       = htmlspecialchars($_GET['resena']);
    $calificacion = htmlspecialchars($_GET['calificacion']);
    $recomienda   = htmlspecialchars($_GET['recomienda']);
    $fecha        = htmlspecialchars($_GET['fecha']);
    $nombre_actor = htmlspecialchars($_GET['actor']);
    $codigoFinal  = isset($_GET['codigo']) ? htmlspecialchars($_GET['codigo']) : "00000";
?>

<table class="tabla-resena" style="margin-top: 20px;">
    <thead>
        <tr>
            <th colspan="2">✅ Reseña Publicada</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>🔢 Código Película</td>
            <td><strong><?php echo $codigoFinal; ?></strong></td>
        </tr>
        <tr>
            <td>🎬 Película</td>
            <td><?php echo $titulo; ?> (<?php echo $anio; ?>)</td>
        </tr>
        <tr>
            <td>🎭 Géneros</td>
            <td><?php echo $generos; ?></td>
        </tr>
        <tr>
            <td>🎤 Actor Principal</td>
            <td><?php echo $nombre_actor; ?></td>
        </tr>
        <tr>
            <td>⭐ Calificación</td>
            <td><?php echo $calificacion; ?>/10</td>
        </tr>
        <tr>
            <td>📝 Reseña</td>
            <td><?php echo $resena; ?></td>
        </tr>
        <tr>
            <td>📣 Veredicto</td>
            <td><span class="badge"><?php echo $recomienda; ?></span></td>
        </tr>
        <tr>
            <td>📅 Fecha de Registro</td>
            <td><?php echo $fecha; ?></td>
        </tr>
    </tbody>
</table>

<?php
}
?>

<script src="validar.js"></script>
</body>
</html>
<?php
require_once 'funcionesPeli.php';

$data = get_datas(API_URL);
$days_message = days_until_message($data['days_until']);

#Se añadido un archivo head.php para separar el codigo de la cabecera del indexProximaPelicula.php
 render_template('head'); 

?>

<!DOCTYPE html>
<html lang="en">

 <main>
    <h1 style="text-align: center;">La proxima pelicula de Marvel </h1>
    
<section>
       <h1><?php echo $data['title'] ;?> - <?php echo $days_message; ?></h1>

   <img src="<?php echo $data['poster_url'];?>" width="400" alt="Poster de <?php echo $data['title']; ?>"
   style="border-radius: 16px; box-shadow: 0 4px 8px rgb(4, 3, 3);"
   />
</section>

<hgroup>
    <h2><n>Fecha de estreno: <?php echo $data['release_date']; ?></n></h2>
    <h3>Tipo de produccion: <?php echo $data['type']; ?></h3>
    <p>¿Cual es el proxima pelicula de estreno de Marvel?- <?php echo $data['following_production']['title']; ?>-</p>
</hgroup>

</main>
</html>

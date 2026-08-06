<?php
CONST API_URL = "https://www.whenisthenextmcufilm.com/api";
#inicializar una nueva sesion de cURL; ch = cuRL handle
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*Ejecutar la peticion
 background-color: black;
 y guadamos el resultado
*/
 $result = curl_exec($ch); 
 $data = json_decode($result, true);
 curl_close($ch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de Marvel</title>
    <!-- Centered viewport -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head> 

 <main>
    <h1 style="text-align: center;">La proxima pelicula de Marvel </h1>
    
<section>
       <h1><?php echo $data['title'] ;?> se estrena en <?php echo $data['days_until']; ?> dias</h1>
       
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









<style>
    root {
        color-scheme: night black ;
    }
   body {
        color: white;
        display: center;
    }
    section {
        display: flex;
          flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
 margin: 0 auto;

    }

    hgroup {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    </style>
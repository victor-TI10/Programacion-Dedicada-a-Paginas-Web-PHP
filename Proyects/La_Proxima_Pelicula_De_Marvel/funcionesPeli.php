<?php
declare(STRICT_TYPES=1); // habilitar el modo estricto de PHP 
CONST API_URL = "https://www.whenisthenextmcufilm.com/api";
#inicializar una nueva sesion de cURL; ch = cuRL handle

function get_datas(string $url): array {
    $result = file_get_contents($url); # a hacer un GET a peticion a la API y obtener el resultado en formato JSON
    $data = json_decode($result, true);
 return $data;
 }
 
function days_until_message(int $days_until): string {

 return match ($days_until) {
        $days_until == 0 => "¡Hoy es el gran día! ¡Disfruta del estreno!",
        $days_until == 1 => "¡Mañana es el estreno! ¡Prepárate para la emoción!",
        $days_until >= 2 && $days_until <= 6 => "Esta semana es el estreno!",
        $days_until < 30 => "Falta menos de 30 días para el estreno!",
        default => "Faltan $days_until días para el estreno. ",
 };
}

function render_template(string $template, array $data = []) {
if (file_exists("templates/$template.HTML")) {
      extract($data); // Extrae las variables del array $data para que estén disponibles en la plantilla
      require "templates/$template.HTML";
}

}






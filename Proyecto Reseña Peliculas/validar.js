document.getElementById('formResena').addEventListener('submit', function(event) {

    let inputPelicula = document.getElementsByName('pelicula')[0];
    let inputAnio = document.getElementsByName('anio')[0];
    let selectGenero = document.getElementsByName('genero[]')[0];
    let textareaResena = document.getElementsByName('resena')[1];
    let inputActor = document.getElementsByName('actor')[0];

    if (inputPelicula.value.trim() === "") {
        alert("El título de la película no puede estar vacío ni contener solo espacios.");
        inputPelicula.focus();
        event.preventDefault(); 
        return;
    }

    let anioValor = parseInt(inputAnio.value);
    let anioActual = new Date().getFullYear();
    if (isNaN(anioValor) || anioValor < 1888 || anioValor > anioActual) {
        alert("Por favor, introduce un año de estreno válido (entre 1888 y " + anioActual + ").");
        inputAnio.focus();
        event.preventDefault();
        return;
    }

    let generoSeleccionado = false;
    for (let i = 0; i < selectGenero.options.length; i++) {
        if (selectGenero.options[i].selected) {
            generoSeleccionado = true;
            break;
        }
    }
    if (!generoSeleccionado) {
        alert("Por favor, selecciona al menos un género cinematográfico.");
        selectGenero.focus();
        event.preventDefault();
        return;
    }


    let valorActor = inputActor.value.trim();
    if (valorActor === "") {
       alert("El campo de actor principal no puede estar vacío ni contener solo espacios.");
       inputActor.focus();
      event.preventDefault();
       return;
}

    let valorResena = textareaResena.value.trim();
    if (valorResena === "" || valorResena.length < 5) {
        alert("La reseña no puede estar vacía ni contener solo espacios. Escribe al menos 5 caracteres.");
        textareaResena.value = ""; // Limpia espacios en blanco visualmente
        textareaResena.focus();
        event.preventDefault();
        return;
    }
});
$(document).ready(function () {
    // Seleccionamos todos los elementos dentro de #section_iconos que tienen un ID
    var elementosIconos = $('#section_iconos > div[id]');
    
    // Ocultar todos los bloques de información
    $('[id^="info_"]').css('display', 'none');

    // Mostrar solo el primer bloque de información
    $('#info_CHEMSEX').css('display', 'block');
    
    elementosIconos.on('click', function () {
        mostrarInformacion(this);
    });
});


function mostrarInformacion(elemento) {
    var id = $(elemento).attr('id');
        
        // Ocultamos todos los bloques de información
        $('[id^="info_"]').css('display', 'none');
        
        // Removemos la clase 'icono_activo' de todos los iconos
        $('[id^="icono_"]').removeClass('icono_activo');
        
        // Mostramos el bloque de información que corresponde al icono seleccionado
        $(`#info_${id}`).css('display', 'block');
        
        // Agregamos la clase 'icono_activo' al icono seleccionado
        $(`#icono_${id}`).addClass('icono_activo');
}
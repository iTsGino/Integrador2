jQuery(document).on('submit', '#form_insert', function(event){
    event.preventDefault();
    jQuery.ajax({
        url: '../Asistencias/InsertarAsis.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
    })
    .done(function(respuesta){
        console.log(respuesta);
        swal({
            type:"success",
            title: "¡Datos ingresados con Éxito!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            icon: 'success'
        }).then(function (){
            //window.location = "http://localhost/Proyecto-Integrador/Asistencias/AsistenciaDoc.php";
        })
    })
    .fail(function(resp){
        console.log(resp);
    })
    .always(function(){
        console.log("complete");
    })
});
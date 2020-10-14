$(document).ready(function(){
    
    $("#formulario-contacto").submit(function(){

        console.log('hasta aca todo ok');

        $.ajax({
            type:$(this).attr("method"),
            url:"enviar.php",
            data: $(this).serialize(),
            success: function(respuesta){
                if(respuesta == "ok"){
                    $("#alerta").removeClass("resp").removeClass("alert-danger").removeClass("alert-success").addClass("alert-success");
                    $(".respuesta").html("Enviado!");
                    $(".mensaje-alerta").html("El mensaje ha sido enviado correctamente");
                }else{
                    $("#alerta").removeClass("resp").addClass("alert-danger");
                    $(".respuesta").html("Error al enviar!");
                    $(".mensaje-alerta").html("No se pudo enviar tu mensaje, intentalo de nuevo ó complete todos los campos.");
                }
             
            },
            error: function(){
                $("#alerta").removeClass("resp").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
                $(".respuesta").html("Error al enviar!");
                $(".mensaje-alerta").html("No se pudo enviar tu mensaje, intentalo de nuevo.");
            }
        });

        return false;
    });

});
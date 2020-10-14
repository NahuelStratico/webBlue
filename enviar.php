<?php

function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}
header('Content-Type: application/json');


if( isset($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['medio']) && !empty($_FILES['file']) ){

    $destino = "straticonahuel@gmail.com";
    $name = validar_campo($_POST["name"]);
    $phone = validar_campo($_POST["phone"]);
    $email = validar_campo($_POST["email"]);
    $msg = validar_campo($_POST["medio"]);

    $ruta = "img/".$_FILES["file"]['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $ruta);


    $contenido = "Nombre: " .$name;
    $contenido = "\n phone: " .$phone;
    $contenido .= "\n Correo: " . $email;
    $contenido .= "\n medio: " . $msg;
    $contenido .= $_FILES['file']['name'];
    
    $headers = "from: " .$name;
    
    $subject = "Un cliente adjunto listado de proveedores, su nomre es: ". $name;
    
    $contenido = "Hola un posible cliente completo el formulario de la web. \n\n Nombre del interesado: " .$name ."\n\n Telefono de contacto: ".$phone . "\n\n Correo de contacto: " .$email ."\n\n Su mensaje fue: ".$msg;

    mail($destino,$subject , $contenido, $headers);


    return print(json_encode('ok'));
}

return print(json_encode('no se envio'));



?>
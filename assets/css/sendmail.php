<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y limpia los datos recibidos para evitar inyección
    $nombre = htmlspecialchars($_POST['nombre']);
    $edad = htmlspecialchars($_POST['edad']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $contacto_preferencia = htmlspecialchars($_POST['contacto_preferencia']);
    $experiencia = htmlspecialchars($_POST['experiencia']);
    $estilo = htmlspecialchars($_POST['estilo']);
    $estilo_otro = isset($_POST['estilo_otro']) ? htmlspecialchars($_POST['estilo_otro']) : '';
    $piel = htmlspecialchars($_POST['piel']);
    $piel_otro = isset($_POST['piel_otro']) ? htmlspecialchars($_POST['piel_otro']) : '';
    $alergia = htmlspecialchars($_POST['alergia']);
    $alergia_otro = isset($_POST['alergia_otro']) ? htmlspecialchars($_POST['alergia_otro']) : '';
    $rutina = htmlspecialchars($_POST['rutina']);
    $rutina_otro = isset($_POST['rutina_otro']) ? htmlspecialchars($_POST['rutina_otro']) : '';
    $tipo_maquillaje = htmlspecialchars($_POST['tipo_maquillaje']);
    $maquillaje_otro = isset($_POST['maquillaje_otro']) ? htmlspecialchars($_POST['maquillaje_otro']) : '';
    $prueba = htmlspecialchars($_POST['prueba']);
    $fecha_evento = htmlspecialchars($_POST['fecha_evento']);
    $hora_evento = htmlspecialchars($_POST['hora_evento']);
    $lugar = htmlspecialchars($_POST['lugar']);
    $direccion = isset($_POST['direccion']) ? htmlspecialchars($_POST['direccion']) : '';
    $consentimiento_fotos = htmlspecialchars($_POST['consentimiento_fotos']);
    $acepta_final = htmlspecialchars($_POST['acepta_final']);

   //Mi dirección
    $para = "herminiaborgut@gmail.com"; 

    // Asunto del correo
    $asunto = "Nueva cita de maquillaje - $nombre";

    // Construye el cuerpo del mensaje
    $mensaje = "Has recibido una nueva solicitud de cita con los siguientes datos:\n\n";
    $mensaje .= "Nombre completo: $nombre\n";
    $mensaje .= "Edad: $edad\n";
    $mensaje .= "Teléfono: $telefono\n";
    $mensaje .= "Correo electrónico: $email\n";
    $mensaje .= "Preferencia de contacto: $contacto_preferencia\n";
    $mensaje .= "Experiencia previa con maquillaje profesional: $experiencia\n";
    $mensaje .= "Estilo preferido: $estilo";
    if ($estilo == "otro") {
        $mensaje .= " - $estilo_otro";
    }
    $mensaje .= "\n";
    $mensaje .= "Tipo de piel: $piel";
    if ($piel == "otro") {
        $mensaje .= " - $piel_otro";
    }
    $mensaje .= "\n";
    $mensaje .= "Alergia a algún producto o ingrediente: $alergia";
    if ($alergia == "otro") {
        $mensaje .= " - $alergia_otro";
    }
    $mensaje .= "\n";
    $mensaje .= "Rutina de cuidado antes del maquillaje: $rutina";
    if ($rutina == "otro") {
        $mensaje .= " - $rutina_otro";
    }
    $mensaje .= "\n";
    $mensaje .= "Tipo de maquillaje: $tipo_maquillaje";
    if ($tipo_maquillaje == "otro") {
        $mensaje .= " - $maquillaje_otro";
    }
    $mensaje .= "\n";
    $mensaje .= "Necesita prueba de maquillaje: $prueba\n";
    $mensaje .= "Fecha del evento: $fecha_evento\n";
    $mensaje .= "Hora preferente para la cita: $hora_evento\n";
    $mensaje .= "Lugar preferido para el maquillaje: $lugar\n";
    $mensaje .= "Dirección: $direccion\n";
    $mensaje .= "Consentimiento para grabar o fotografiar la sesión: $consentimiento_fotos\n";
    $mensaje .= "Acepta términos y condiciones: $acepta_final\n";

    // Cabeceras para que el email se vea bien y permita responder
    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";

    // Envía el correo
    if(mail($para, $asunto, $mensaje, $cabeceras)) {
        echo "Gracias por enviar tu cita. Pronto nos pondremos en contacto contigo.";
    } else {
        echo "Lo sentimos, hubo un error al enviar el formulario. Por favor intenta más tarde.";
    }
} else {
    echo "Método no permitido.";
}
?>
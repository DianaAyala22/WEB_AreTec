<?php 

    if(!empty($_POST["name"]) && !empty($_POST["message"]) && !empty($_POST["email"])) {
        
        $destino = "atencionalcliente@aretec.tech";
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $content = "Nombre: " . $name . "\nCorreo" . $email . "\nMensaje" . $message; 
    
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $sendMail = mail($destino, "Servicio al cliente: Mensaje", $content);

            if($sendMail) {
                $response = array("status" => "success", "message" => "Mensaje enviado con éxito");
                echo json_encode($response);

            }else {
                $response = array("status" => "error", "message" => "Ocurrió un error al enviar el mensaje");
                echo json_encode($response);
            }
        }else {
            $response = array("status" => "error", "message" => "Correo electrónico invalido");
            echo json_encode($response);
        }
    } else {
        $response = array("status" => "error", "message" => "Todos los campos deben ser llenados");
        echo json_encode($response);
    }

?>
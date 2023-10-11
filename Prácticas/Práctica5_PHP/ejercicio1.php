<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '66ece7d9c3a6ec';
    $phpmailer->Password = 'a51b57418d5fac';  

    $phpmailer->setFrom('practica@entornos.com', 'Name');
    $phpmailer->addAddress('aarondebernardo@gmail.com');  
    $phpmailer->isHTML(true);                                  
    $phpmailer->Subject = 'Subject';
    $phpmailer->Body    = ' <html>
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Título del mail</title>
                                </head>
                                <body>
                                    <p>Hola Milton. ¿Cómo estás? ¿Llovió mucho en Villa Cañás?</p>
                                    <img src="https://services.meteored.com/img/article/microfisica-de-nubes-y-formacion-de-la-lluvia-1670754813980_1280.jpeg" alt="Un paraguas bajo la lluvia">
                                </body>
                            </html>';
    
    if ($phpmailer->send() == false){
        echo 'no se pudo enviar el email';
        echo $phpmailer->ErrorInfo;
    }else{
        echo 'mensaje enviado';
    }



/*Utilizando la función mail - ya obsoleta
    $destinatario = "aarondebernardo@gmail.com";
    $asunto = "MAIL ENVIADO CON PHP";
    $cuerpo = '
    <html>
        <head>
            <title>Título del mail</title>
        </head>
        <body>
            <p>Hola Milton. ¿Cómo estás? ¿Llovió mucho en Villa Cañás?</p>
            <img src="https://services.meteored.com/img/article/microfisica-de-nubes-y-formacion-de-la-lluvia-1670754813980_1280.jpeg" alt="Un paraguas bajo la lluvia">
        </body>
    </html>';
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    mail($destinatario, $asunto, $cuerpo, $headers);*/
?>
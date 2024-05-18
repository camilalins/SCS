<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

/**
 * @param $to Para E-mail do destinatário
 * @param $subject Assunto Assunto do e-mail
 * @param $message Mensagem Corpo da mensagem em HTML
 * @param $attachs Anexos Array contendo os caminhos dos anexos
 * @return bool Resposta se enviou ou não. Caso não tenha enviado, obter o erro pela função send_mail_error()
 */
function send_mail($to, $subject, $message, $attachs=array()){

    // Instância da classe
    $mail = new PHPMailer(true);
    try
    {
        // Configurações do servidor
        $mail->isSMTP();        //Devine o uso de SMTP no envio
        $mail->SMTPAuth = true; //Habilita a autenticação SMTP
        $mail->CharSet = "UTF-8";
        $mail->Username   = MAIL_SMTP_USER;
        $mail->Password   = MAIL_SMTP_PASSWORD;
        // Criptografia do envio SSL também é aceito
        $mail->SMTPSecure = MAIL_SMTP_CRYPTO;
        // Informações específicadas pelo Google
        $mail->Host = MAIL_SMTP;
        $mail->Port = MAIL_SMTP_PORT;
        // Define o remetente
        $mail->setFrom(MAIL_SMTP_USER, MAIL_SMTP_NAME);
        // Define o destinatário
        $mail->addAddress($to);
        // Conteúdo da mensagem
        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        /* $mail->AltBody = 'Este é o cortpo da mensagem para clientes de e-mail que não reconhecem HTML'; */
        foreach ($attachs as $attach) {
            // isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK
            $mail->addAttachment($attach);
        }
        // Enviar
        $mail->send();
        return true;
    }
    catch (Exception $e) {
        $GLOBALS["send_mail_error"] = "Erro ao enviar e-mail".(DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": {$mail->ErrorInfo}" : "");
        return false;
    }
}

function send_mail_error(){
    return $GLOBALS["send_mail_error"];
}
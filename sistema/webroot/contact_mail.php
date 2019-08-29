
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "ddportes@gmail.com";
        
        

        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , 
        strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);

        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Complete o formulário e tente novamente.";
            exit;
        }

        # Mail Content
        $content = "Nome: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Celular/Whats: $phone\n";
        $content .= "Mensagem:\n$message\n";

        # email headers.
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: ". $email. "\r\n";
        $headers .= "Reply-To: ". $mail_to. "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "X-Priority: 1" . "\r\n"; 

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Obrigado! Sua mensgame foi enviada com sucesso.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Aconteceu algo errado. Sua mensagem não foi enviada.";
        }

        } else {
            # Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "Ocorreu um erro ao tentar enviar o email. Tente novamente.";
        }
?>

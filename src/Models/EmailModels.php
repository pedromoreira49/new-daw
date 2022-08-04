<?php
    namespace src\Models;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class EmailModels{

        public static function sender($email, $nome){
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
            $dotenv->load();

            try {                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $_ENV['MAILER_AUTH'];                     //SMTP username
                $mail->Password   = $_ENV['MAILER_PASS'];                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;        //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->SMTPOptions = [
                 'ssl' => [
                     'verify_peer' => true,
                     'verify_peer_name' => true,
                     'allow_self_signed' => true,
                    ]
                ];
                $mail->setFrom($_ENV['MAILER_AUTH'],'Adm Site');
                $mail->addAddress($email, $nome );
                $mail->Subject = 'Verify Email';
                $code = \src\Models\VerifyModels::genCode();
                $mail->Body = "Your code is: ".$code;
                $mail->send();
                return $code;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

?>
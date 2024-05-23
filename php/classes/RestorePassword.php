<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "db_con.php";
// require_once '../../vendor/autoload.php';

class RestorePassword {
    public function sendEmailRP($emailUser){
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = 'brian.a.electro@gmail.com'; // Usuario SMTP
            $mail->Password   = 'scwx annh ovim tbbe'; // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación TLS
            $mail->Port       = 587; // Puerto TCP

            // Configuración del remitente y destinatario
            $mail->setFrom('brian.a.electro@gmail.com', 'Soporte de Electro Shop');
            if ($this->verifyEmail($emailUser)) {
                $password = $this->generarContrasenaAleatoria();
                $this->replacePSW($emailUser, $password);
                $mail->addAddress($emailUser, $this->getName($emailUser));

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Recuperacion de contraseña';
                $mail->Body    = $this->getBodyEmail($emailUser, $password);
                $mail->AltBody = 'Tu nueva contraseña es CONTRASEÑA, para más seguridad cambiala a la brevedad.';

                $mail->send();
                // echo 'Correo enviado exitosamente.';
            }
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    public function generarContrasenaAleatoria($longitud = 12, $incluirMayusculas = true, $incluirNumeros = true, $incluirCaracteresEspeciales = true) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyz';
        if ($incluirMayusculas) {
            $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($incluirNumeros) {
            $caracteres .= '0123456789';
        }
        if ($incluirCaracteresEspeciales) {
            $caracteres .= '!@#$';
        }
    
        $contrasena = '';
        $max = strlen($caracteres) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $contrasena .= $caracteres[random_int(0, $max)];
        }
    
        return $contrasena;
    }

    public function verifyEmail($email) {
        try {
            $con = new Conexion();
            $query=$con->prepare("SELECT client.id, client.email
            FROM client WHERE client.email = :EMAIL");

            $query->bindParam(':EMAIL',$email);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                //return $result['id'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getName($email) {
        try {
            $con = new Conexion();
            $query=$con->prepare("SELECT client.id, client.email, client.firstName
            FROM client WHERE client.email = :EMAIL");

            $query->bindParam(':EMAIL',$email);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['firstName'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function replacePSW($email, $password) {
        try {
            $con = new Conexion();
            $query=$con->prepare("UPDATE Client SET client.password=:PSW WHERE email=:EMAIL");

            $query->bindParam(':PSW',$password);
            $query->bindParam(':EMAIL',$email);
            $query->execute();
            // $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($query->rowCount()) {
                // return $result['firstName'];
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getBodyEmail($emailUser, $password){
        return '<!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Nuevo Contraseña Creada</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        color: #333333;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #ffffff;
                        padding: 20px;
                        border: 1px solid #dddddd;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .header {
                        text-align: center;
                        padding: 10px 0;
                    }
                    .header h1 {
                        margin: 0;
                        color: #007BFF;
                    }
                    .content {
                        padding: 20px 0;
                    }
                    .content p {
                        margin: 10px 0;
                    }
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        margin: 20px 0;
                        background-color: #007BFF;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 5px;
                    }
                    .footer {
                        text-align: center;
                        padding: 10px 0;
                        font-size: 12px;
                        color: #777777;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>Nueva Contraseña Creada</h1>
                    </div>
                    <div class="content">
                        <p>Hola '.$this->getName($emailUser).',</p>
                        <p>Tu contraseña ha sido creada con éxito. A continuación, encontrarás tu nueva contraseña:</p>
                        <p><strong>Nueva Contraseña: '.$password.'</strong></p>
                        <p>Te recomendamos cambiar esta contraseña después de iniciar sesión por primera vez por una que te sea más fácil de recordar.</p>
                        <p>Si no solicitaste este cambio, por favor, contacta con nuestro equipo de soporte de inmediato.</p>
                        <a href="#" class="button">Iniciar Sesión</a>
                    </div>
                    <div class="footer">
                        <p>&copy; 2024 Electro Shop. Todos los derechos reservados.</p>
                    </div>
                </div>
            </body>
        </html>
        ';
    }
}

// $sendNewPSW = new RestorePassword();

// echo $newPSW = $sendNewPSW->generarContrasenaAleatoria();
// echo "<br>";
// echo $sendNewPSW->verifyEmail("briansitovalles@gmail.com");
// echo "<br>";
// echo $sendNewPSW->replacePSW("briansitovalles@gmail.com", $newPSW)
// $sendNewPSW->sendEmailRP("briansitovalles@gmail.com", "Alonso");
?>
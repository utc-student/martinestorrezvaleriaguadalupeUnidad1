<?php
require_once "db_con.php";

class Client {
    protected $idClient;
    protected $firstNameClient = "Alonso";
    protected $lastNameClient;
    protected $emailClient;
    protected $passwordClient;
    protected $phoneNumberClient;

    /**
     * Validate if the Client exist.
     *
     * @param string $emailClient Email Client.
     * @param string $passwordClient PasswordClient.
     * @return bool Return true if the Client exist, false if doesn't exist.
     */
    public function clientExists($emailClient, $passwordClient) {
        try {
            $con = new Conexion();
            //$query=$con->prepare('SELECT * from clientes WHERE email=:email and password=:password');
            $query=$con->prepare("SELECT client.id, client.email, client.`password` FROM client 
                                WHERE client.email = :EMAIL AND client.`password` = :PASSWORD LIMIT 1");

            $query->bindParam(':EMAIL',$emailClient);
            $query->bindParam(':PASSWORD',$passwordClient);
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

    /**
     * Register a new cliente in the table Client
     *
     * @param string $fNameClient Email Client.
     * @param string $lNameClient Email Client.
     * @param string $emailClient Email Client.
     * @param string $passwordClient PasswordClient.
     * @param string $pNumberClient Email Client.
     * @return bool Return true if the Client exist, false if doesn't exist.
     */
    public function createClient() {
        
    }

    /**
     * Get the value of firstNameClient
     */ 
    public function getFirstNameClient()
    {
        return $this->firstNameClient;
    }
}

/* $cliente = new Client();
$bool = $cliente->clientExists("dawnspencer9@yahoo.com", "6QvH7gpFZB");
echo "Existe el usuario: " . $bool;  */
?>
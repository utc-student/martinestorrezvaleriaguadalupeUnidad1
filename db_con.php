<?php
	// Conexion a la BD que esta almacenada en el localhost de XAMPP
	class Conexion extends PDO{
		// Atributos de la clase Conexion
		private $db_type='mysql';
		private $host='localhost';
        private $port=3333;
		private $database_name='db_tienda';

		private $user='root';
		private $password='';

		// Constructor de la clase Conexion
		public function __construct(){
			try{//Intentara el siguiente codigo, que es para conectar la BD
				//parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
                parent::__construct($this->db_type.':host='.$this->host.';port='.$this->port.';dbname='.$this->database_name /*Fin DNS*/, $this->user, $this->password);
                //echo "Conexion exitosa";
			}
			catch (PDOException $e){
				echo "<img src='https://i.redd.it/k4zc9x54rci61.jpg'>
					<br>Ha surgido un error y no se pudo conectar a la BD.
					<br>Detalle: ".$e->getMessage();
			}
		}
	}
?>
<?php

$con = mysqli_connect("localhost", "root", "", "king");
class DBController
{
    // Propiedades de la conexión a la base de datos
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "king";
    
    

    // Metodo constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // Metodo finalizar conexión a la base de datos
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}

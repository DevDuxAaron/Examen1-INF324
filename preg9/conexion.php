<?php
class Conexion extends PDO
{
    private $host = "localhost";
    private $database = "mibaseaaronlimachi";
    private $user = "root";
    private $password = "";

    public function __construct()
    {
        try {
            parent::__construct(
                'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8',
                $this->user,
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
    }
}

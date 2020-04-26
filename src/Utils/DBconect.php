<?php

namespace ProjetosIgor\ReservaMaterial\Utils;

use Exception;
use PDO;
use PDOException;

class DBconect
{
    private PDO $conn;

    public function __construct()
    {

        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=reserva_materiais', 'root', '');
            
        }
        catch( PDOException $e ) {
           echo "Erro ao conectar ao banco de dados: ". $e->getMessage();
           exit();
        }
      
    }

    public function getConn(): PDO{

        return $this->conn;

    }

}
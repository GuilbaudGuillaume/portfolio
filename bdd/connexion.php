<?php

class ConnexionBdd
{
    protected $_Bdd;

    public function __construct()
    {
        try
        {
            $this->_Bdd = new PDO('mysql:host=localhost;dbname=rpg;unix_socket=/home/guilba_c/.mysql/mysql.sock', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public function getbdd()
    {
        return $this->_Bdd;
    }
}

?>
<?php

class ConexaoDB {
    public $host;
    public $database;
    public $user;
    public $password;

    public function __construct()
    {
        $this->host = 'SERVER';
        $this->database = 'DATABASE';
        $this->user = 'USUÁRIO';
        $this->password = 'SENHA DO USUÁRIO';
    }

    public function conectarDB(){
        try {
            $conectarDB = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->user, $this->password);
            if ($conectarDB){
               return $conectarDB;
            }
        } catch (PDOException $erroPDO) {
            echo 'ERROR: ' . $erroPDO->getMessage();
        }
    }
}
<?php
class Db {
    private string $host= "mariadb";
    private string $port="3306";
    private string $dbname="homework";
    private string $username="root";
    private string $password= "root";

    protected function connection()
    {
        try{
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname";
            $pdo = new PDO ($dsn,"$this->username","$this->password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }catch(Exception $e){
            echo "Veritabanı hatası: ".$e->getMessage();
        }
        
    }
}
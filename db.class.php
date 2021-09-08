<?php
class Db
{
    private string $host = "172.27.0.1";
    private string $port = "3306";
    private string $dbname = "default";
    private string $username = "default";
    private string $password = "secret";
    protected function connection()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }
    protected function getPostDetails()
    {
        try {
            $sql = "SELECT * FROM posts";
            $statement = $this->connection()->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }
    protected function getSelectPostDetails(int $id)
    {
        try {
            $sql = "SELECT * FROM posts WHERE Id = :Id";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":Id", $id);
            $statement->execute();
            $result = $statement->fetchAll();
            if (empty($result[0])) {
                return 0;
            }
            return $result;
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }
}

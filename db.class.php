<?php
class Db
{
    private $host = "mariadb";
    private $port = "3306";
    private $dbname = "default";
    private $username = "default";
    private $password = "secret";
    protected function connection()
    {
        try {
            $dsn =
                "mysql:host=" .
                $this->host .
                ";port=" .
                $this->port .
                ";dbname=" .
                $this->dbname;
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
    protected function addPost(string $title, string $content, string $image)
    {
        try {
            $sql =
                "INSERT INTO posts (Title, Content, Imageurl) VALUES (:Title, :Content, :Imageurl)";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":Title", $title);
            $statement->bindValue(":Content", $content);
            $statement->bindValue(":Imageurl", $image);
            $statement->execute();
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }

    protected function updatePost(
        int $id,
        string $title,
        string $content,
        string $imageurl
    ) {
        try {
            $sql =
                "UPDATE posts SET Title = :Title, Content = :Content, Imageurl= :Imageurl WHERE Id = :Id";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":Title", $title);
            $statement->bindValue(":Content", $content);
            $statement->bindValue(":Id", $id);
            $statement->bindValue(":Imageurl", $imageurl);
            $statement->execute();
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }
    protected function deletePost(int $id)
    {
        try {
            //Düzenle formu için id değişkinine ait içerik bilgileri return edilecek.
            $sql = "DELETE FROM posts WHERE Id = :Id";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":Id", $id);
            $statement->execute();
        } catch (Exception $e) {
            echo "Veritabanı hatası: " . $e->getMessage();
        }
    }
}

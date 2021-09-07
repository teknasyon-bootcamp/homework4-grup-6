<?php
include_once "db.class.php";

class Post extends Db{

    public function getPostList(){
        $sql = "SELECT * FROM posts";
        $statement = $this->connection()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
            foreach ($result as $r){

                echo $r[1]."<br>";
                echo $r[2]."<br>";
                echo $r[3]."<br>";
            }
    }

    public function getSpesificPost(){
        $id = $_GET['id'] ?? null;
        if (!$id){
            header ("location:index.php");
        }
        $sql = "SELECT * FROM posts WHERE id = :id";
        $statement = $this->connection()->prepare($sql);
        $statement ->bindValue(':id',$id);
        $statement->execute();

        while ($result = $statement->fetchAll()){
            return $result;
        }
    }

    public function createPost(){
        $errors = [];
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;

        if (!$title){
            $errors[] = 'Post başlığı gereklidir';
        }
        if (!$content){
            $errors[] = 'Post içeriği gereklidir';
        }

        if (!empty($errors)){
            ?> <div class = "alert alert-danger">
            <?php foreach ($errors as $error): ?>
              <div><?php echo $error ?> </div>
            <?php endforeach; ?>
            </div> <?php
        }

        else {
            $sql = "INSERT INTO products (title, content) 
            VALUES (:title, :content)";
            $statement = $this->connection()->prepare($sql);
            $statement ->bindValue(':title',$title);
            $statement ->bindValue(':content',$content);
            $statement->execute();

            header("location:index.php");
        }
    }

    public function deletePost(){
        $id = $_GET['id'] ?? null;
        if (!$id){
            header ("location:index.php");
        }
        $sql = "DELETE FROM posts WHERE id = :id";
        $statement = $this->connection()->prepare($sql);
        $statement ->bindValue(':id',$id);
        $statement->execute();

        header("location:index.php");
    }
    

    public function updatePost(){
        $id = $_GET['id'] ?? null;
        if (!$id){
            header ("location:index.php");
        }
        $errors = [];
        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;

        if (!$title){
            $errors[] = 'Post başlığı gereklidir';
        }
        if (!$content){
            $errors[] = 'Post içeriği gereklidir';
        }

        if (!empty($errors)){
            ?> <div class = "alert alert-danger">
            <?php foreach ($errors as $error): ?>
              <div><?php echo $error ?> </div>
            <?php endforeach; ?>
            </div> <?php
        }

        else {
            $sql = "UPDATE products SET title = :title, content = :content WHERE id = :id)";
            $statement = $this->connection()->prepare($sql);
            $statement ->bindValue(':title',$title);
            $statement ->bindValue(':content',$content);
            $statement ->bindValue(':id',$id);
            $statement->execute();

            header("location:index.php");
        }
    }
}
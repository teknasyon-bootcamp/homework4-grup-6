<?php
include_once "db.class.php";

class Post extends Db
{
    private $posts = [];
    private $manage = 0;
    public function getPostList(int $manage = 0)
    {
        $this->manage = $manage; // Veritabanından bütün post verilerini çekme.
        $this->posts = $this->getPostDetails();
        $this->listPost();
    }
    public function getSelectPostList(int $manage = 0)
    {
        if (!isset($_GET["post"])) {
            return 0;
        }
        $id = $_GET["post"];
        $action = 0;
        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        }
        $this->manage = $manage; // Veritabanından id değerine göre post verisini çekme.
        $this->posts = $this->getSelectPostDetails($id);
        switch ($action) {
            case "create":
                $this->createPost();
                break;
            case "store":
                $this->storePost();
                break;
            case "edit":
                $this->editPost();
                break;
            case "update":
                $this->updatePost();
                break;
            case "deletePost":
                $this->deletePost();
                break;
            default:
                $this->listPost();
        }
    }
    public function storePost()
    {
        $manage = $this->manage;
        $posts = $this->posts;
        echo "Store";
    }
    public function editPost()
    {
        $manage = $this->manage;
        $posts = $this->posts;
        echo "Edit";
    }
    public function listPost()
    {
        $manage = $this->manage;
        $posts = $this->posts;

        if (is_array($posts)) {
            if (count($posts) == 1) {
                // Seçilen Post
                $this->viewPost(1, $posts[0]);
            } elseif (count($posts) > 1) {
                // Post Listeleme
                foreach ($posts as $key => $val) {
                    $this->viewPost($key, $val);
                }
            } else {
                // Post Not Found
                echo "POST NOT FOUND";
            }
        }
    }
    public function viewPost(int $key, array $data)
    {
        // Postları görüntüleme
        $manage = $this->manage;
        $posts = $this->posts;
        ?>
	<div class="postview card" style="border:1px solid #fff;padding:10px;margin:10px;">
	<div class="title"><?php echo $data["Title"]; ?></div>
	<div class="content"><?php echo $data["Content"]; ?></div>
	<div class="time"><?php echo $data["Time"]; ?> </div>
	<div class="button"><button>Görüntüle</button> <?php if (
     $manage
 ) { ?><button>Düzenle</button> <button>Sil</button> <?php } ?></div>
	</div>
	<?php
    }

    public function createPost()
    {
        $errors = [];
        $title = $_POST["title"] ?? null;
        $content = $_POST["content"] ?? null;

        if (!$title) {
            $errors[] = "Post başlığı gereklidir";
        }
        if (!$content) {
            $errors[] = "Post içeriği gereklidir";
        }

        if (!empty($errors)) { ?> <div class = "alert alert-danger">
            <?php foreach ($errors as $error): ?>
              <div><?php echo $error; ?> </div>
            <?php endforeach; ?>
            </div> <?php } else {$sql = "INSERT INTO products (title, content) 
            VALUES (:title, :content)";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":title", $title);
            $statement->bindValue(":content", $content);
            $statement->execute();

            header("location:index.php");}
    }

    public function deletePost()
    {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("location:index.php");
        }
        $sql = "DELETE FROM posts WHERE id = :id";
        $statement = $this->connection()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        header("location:index.php");
    }

    public function updatePost()
    {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("location:index.php");
        }
        $errors = [];
        $title = $_POST["title"] ?? null;
        $content = $_POST["content"] ?? null;

        if (!$title) {
            $errors[] = "Post başlığı gereklidir";
        }
        if (!$content) {
            $errors[] = "Post içeriği gereklidir";
        }

        if (!empty($errors)) { ?> <div class = "alert alert-danger">
            <?php foreach ($errors as $error): ?>
              <div><?php echo $error; ?> </div>
            <?php endforeach; ?>
            </div> <?php } else {$sql =
                "UPDATE products SET title = :title, content = :content WHERE id = :id)";
            $statement = $this->connection()->prepare($sql);
            $statement->bindValue(":title", $title);
            $statement->bindValue(":content", $content);
            $statement->bindValue(":id", $id);
            $statement->execute();

            header("location:index.php");}
    }
}

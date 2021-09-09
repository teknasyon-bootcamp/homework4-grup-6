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
        $action = 0;
        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        }
        switch ($action) {
            case "create":
                $this->createForm();
                break;
            case "store":
                $this->createFormPost();
                break;
            default:
                $this->listPost();
        }
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
                $this->createForm();
                break;
            case "store":
                $this->createFormPost();
                break;
            case "edit":
                $this->editForm($id);
                break;
            case "update":
                $this->editFormPost($id);
                break;
            case "delete":
                $this->getDeletePost($id);
                break;
            default:
                echo "";
                $this->listPost();
        }
    }
    public function listPost()
    {
        $manage = $this->manage;
        $posts = $this->posts;
        if (!empty($this->manage)) {
            echo '<div class="row mt-3" style="display:block;"><a class="btn btn-primary btn-sm float-right mx-2" href="manage.php?action=create" role="button">İçerik Ekle</a><div style="display:block;clear:both"></div></div>';
        }
        if (is_array($posts)) {
            if (count($posts) == 1) {
                // Seçilen Post
                if (!empty($posts[0]["Id"])) {
                    $this->viewPost($posts[0]["Id"], $posts[0]);
                }
            } elseif (count($posts) > 1) {
                // Post Listeleme
                foreach ($posts as $key => $val) {
                    $this->viewPost($val["Id"], $val);
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
	<div class="row mt-3">
      <!-- row - start -->
      <div class="col-sm-10 " style="font-family:verdana;">
        <!-- about us - start-->
        <h2><?php echo $data["Title"]; ?></h2>
        <p><?php echo $data["Content"]; ?></p>
		<div class="time"><?php echo $data["Time"]; ?> </div>
		
		
		<a class="btn btn-danger btn-sm float-right mx-2" href="<?php echo !empty(
      $this->manage
  )
      ? "manage.php"
      : "index.php"; ?>?post=<?php echo $key; ?>" role="button">Sil</a> 
		
		<?php if ($manage) { ?> 
		<a class="btn btn-warning btn-sm float-right mx-2" href="manage.php?action=edit&post=<?php echo $key; ?>" role="button">Düzenle</a> 
		<a class="btn btn-info btn-sm float-right mx-2" href="manage.php?action=delete&post=<?php echo $key; ?>" role="button">Görüntüle</a> 
		<?php } ?>
      </div>
	  <?php if (!empty($data["Imageurl"])) { ?>
      <div class="col-sm-2 mt-3"> 
        <img
        class="img-thumbnail btn"
        src="<?php echo $data["Imageurl"]; ?>"
        alt=""
        style="max-width: 120px;"
      />
      <!-- about us - end-->
      </div>
	  <?php } ?>
    </div>
	<?php
    }
    public function createFormPost()
    {
        if (!empty($_POST["title"])) {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $image = $_POST["image"];
            $this->addPost($title, $content, $image);
            echo 'Başarılı bir şekilde eklendi. <a href="manage.php">Geri Dön</a>';
        } else {
            echo "Hata";
        }
    }
    public function formPost()
    {
        if (!empty($_POST["title"])) {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $image = $_POST["image"];
            $this->addPost($title, $content, $image);
        }
    }
    public function createForm()
    {
        $action = "manage.php?action=store"; ?>
	<form method="post" action="<?php echo $action; ?>">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Title</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="title" required value>
                              <small id="emailHelp" class="form-text text-muted">Bizden başkası bilmeyecek korkma.. :)</small>
                            </div>
							<div class="form-group">
                              <label for="exampleFormControlInput1">Image URL</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="image">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">İçerik</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" required value rows="3" name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Gönder/Güncelle</button>
    </form>
	<?php
    }
    public function editForm($id = 0)
    {
        if (!empty($id)) {
            $datas = $this->getSelectPostDetails($id);
            foreach($datas as $key => $data){
                $title = $data[1];
                $content = $data[2];
                $imageurl = $data[4];
            }
        
            $action = "manage.php?action=update&post=$id";

        }
        ?>
	<form method="post" action="<?php echo $action; ?>">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Title</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="title" required value="<?php echo $title; ?>">
                              <small id="emailHelp" class="form-text text-muted">Bizden başkası bilmeyecek korkma.. :)</small>
                            </div>
							<div class="form-group">
                              <label for="exampleFormControlInput1">Image URL</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="image" required value="<?php echo $imageurl; ?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">İçerik</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" required><?php echo $content; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Gönder/Güncelle</button>
    </form>
	<?php
    }
    public function editFormPost($id)
    {
        if (!empty($_POST["title"])) {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $image = $_POST["image"];
            $this->updatePost($id, $title, $content, $image);
            echo 'Başarılı bir şekilde güncelleme yapıldı. <a href="manage.php">Geri Dön</a>';
        }
    }
    public function getDeletePost(int $id)
    {
        $this->deletePost($id);
        echo 'Başarılı bir şekilde silindi. <a href="manage.php">Geri Dön</a>';
    }
}

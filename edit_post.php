<?php
  session_start();
  include './inc/env.php';
  //* ID FETCH FROM URL
  $id=$_GET['id'];

  //*QUERY
  $query="SELECT id,title,description FROM post WHERE id='$id'";
  $fetch=mysqli_query($conn,$query);
  $post=mysqli_fetch_assoc($fetch);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./all_post.php">All Post</a>
        </li>
        
      </ul>

    </div>
  </div>
</nav>
<!--Toast-->
<?php

  if(isset($_SESSION['successful_message'])){
  ?>
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center">
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
    <strong class="me-auto">Bootstrap</strong>
    <small><?=date("d D/m M/Y");?></small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-success fw-bold">
    <?=$_SESSION['successful_message'];?>
    </div>
  </div>
</div>
<?php
  }
?>

<div class="card col-md-6 mx-auto mt-3">
    <div class="card-header text-center text-white bg-secondary">
        <h3>Edit a new post</h3>
    </div>
    <div class="card-body">
        <form action="./controller/post_update.php" method="POST">
            <input type="text" placeholder="Add a title" class="form-control" name="title" value="<?=$post['title']?>">
            <span class="text-danger">
            <?php
            if(isset($_SESSION['error_title'])){
              echo $_SESSION['error_title'];
            } 
            ?>
            </span>
            <textarea name="description" class="form-control my-3" placeholder="Add description"><?=$post['description']?></textarea>
            <span class="text-danger">
            <?php
            if(isset($_SESSION['error_description'])){
              echo $_SESSION['error_description'];
            } 
            ?>
            </span>
            <button class="btn btn-primary w-100" name="submit_button">Save Changes</button>
        </form>
    </div>

</div>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  session_unset();
?>
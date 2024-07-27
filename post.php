<?php
session_start();
include "./inc/env.php";
$id=$_GET['id'];
$querry="SELECT*FROM post WHERE id='$id'";
$select=mysqli_query($conn,$querry);
$post=mysqli_fetch_assoc($select);
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
    <div class="card col-5 mx-auto mt-5">
        <div class="card-header ">
                <div class="d-flex justify-content-between">
                <span class="fw-bold"><?=$post['title'];?></span>
                <div>
                <span class="badge rounded-pill text-bg-success "><?=date('D d,M m,Y',strtotime($post['time']));?></span>
                <a href="./all_post.php" class="btn btn-sm btn-danger">Back</a>
                </div>
                </div>
        </div>
        <div class="card-body">
        <?=$post['description'];?>
        </div>
    </div>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  session_unset();
?>
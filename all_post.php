<?php
session_start();
include "./inc/env.php";
$querry="SELECT*FROM post";
$fetch=mysqli_query($conn,$querry);
$posts=mysqli_fetch_all($fetch,1);
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
<div class="card col-8 mx-auto mt-5">
    <div class="card-heading d-flex justify-content-between p-2">
        <h3>View All Post</h3>
        <a href="./index.php" class="btn btn-sm btn-danger">Back</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr class="fw-bold">
                <td>SL</td>
                <td>Name</td>
                <td>Description</td>
                <td>Date</td>
                <td>Actions</td>
            </tr>
            <?php
              foreach($posts as $key=>$post){
            ?>
              <tr>
                <td><?=++$key;?></td>
                <td><?=$post['title'];?></td>
                <td>
                  <?php
                      if(strlen($post['description'])>50){
                        echo substr($post['description'],0,50)."...";
                      }else{
                        echo $post['description'];
                      }
                  ?>
                </td>
            
                <td>
                  <span class="badge rounded-pill text-bg-success mt-1 ms-1"><?=$post['time'];?>
                </span>
              </td>
              <td>
                <div class="btn-group">
                  <a href="./post.php?id=<?=$post['id'];?>" class="btn btn-sm btn-primary">Show</a>
                  <a href="./edit_post.php?id=<?=$post['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </div>
              </td>
              </tr>
             <?php 
              }
            ?>
        </table>
    </div>

</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  session_unset();
?>
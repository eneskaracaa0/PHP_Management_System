<?php
require_once 'db/database.php';


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fınaly project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    
  </head>
  <body>
    <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Kullanıcı Giriş</h3>
        <form action="kontrol.php" method="POST">
            <div class="form-outline mb-4">
              <input type="text" name="username"  class="form-control form-control-lg" />
              <label class="form-label">UserName</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            

            <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
        </form>
            <hr class="my-4">

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
  




   <?php require_once 'footer.php';?>
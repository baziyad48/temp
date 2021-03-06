<?php
require_once("proseslogin.php");

if(isset($_POST['SIGN UP'])){

  // filter data yang diinputkan
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  // enkripsi password
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


  // menyiapkan query
  $sql = "INSERT INTO users (name, username, email, password) 
          VALUES (:name, :username, :email, :password)";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
      ":name" => $name,
      ":username" => $username,
      ":password" => $password,
      ":email" => $email
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
  <title>AfterNotes • Social film discovery.</title>
</head>

<body>
  <!-- Navbar, Hero, Title -->
  <section id="title">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="home.html">AfterNotes</a>
      <!-- Responsive Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Main Navigation Bar -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn pt-0 pr-0 pl-0 pb-0" data-target="#SignIn">
              <a class="nav-link" href = "login.php">SIGN IN</a>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn pt-0 pr-0 pl-0 pb-0" data-target="#SignUp">
              <a class="nav-link" href = "register.php">CREATE ACCOUNT</a>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="discover.html">DISCOVER</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!-- Background Hero -->
    <div class="container-fluid hero d-flex flex-column justify-content-center align-items-center">
      <div class="hero-text">
        <h1 class="heading">The social network for film lovers.</h1>
        <p>Start your film diary now, it‘s free! Or sign in if you‘re already a member.</p>
      </div>
      <div class="overlay"></div>
    </div>
  </section>

  <div class="modal fade" id="SignIn" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Welcome Back!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="proseslogin.php" method="POST">
        <div class="modal-body">
        
            <div class="form-group">
              <label>Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name = 'sign in' class="btn btn-success">SIGN IN</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <div class="modal fade" id="SignUp" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Join Us!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
              <label>Nama Lengkap</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="name" placeholder="Enter name">
              </div>
            </div>
            <div class="form-group">
              <label>Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name = 'register' class="btn btn-success">SIGN UP</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Trending Film -->
  <section id="film" class="container-fluid">
    <h2>Write and share reviews. Share your life in film.</h2>
    <p>Below are some popular reviews and movies from this week. Sign up to create your own.</p>
    <div class="row row-card">
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/us.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/shazam.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/alita.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/petsematary.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/johnwick.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/instantfamily.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
    </div>
    <div class="row row-card">
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/readyplayerone.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/thorragnarok.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/tncfu.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/batman.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/bewithyou.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card">
          <img class="card-img" src="images/poster/pengabdisetan.jpg" alt="">
          <a class="stretched-link" href="#"></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Website Feature -->
  <section id="features">
    <p>AfterNotes LETS YOU…</p>
    <div class="row justify-content-center">
      <div class="col-md-3 feature-box">
        <i class="fas fa-eye fa-3x feature-img"></i>
        <p>Keep track of every film you’ve ever watched (or just start from the day you join)</p>
      </div>
      <div class="col-md-3 feature-box">
        <i class="fas fa-heart fa-3x feature-img"></i>
        <p>Show some love for your favorite films and reviews with a 'like'</p>
      </div>
      <div class="col-md-3 feature-box">
        <i class="fas fa-align-left fa-3x feature-img"></i>
        <p>Write and share reviews, and follow friends and other members to read theirs</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-3 feature-box ">
        <i class="fas fa-star fa-3x feature-img"></i>
        <p>Rate each film on a five-star scale (with halves) to record and share your reaction</p>
      </div>
      <div class="col-md-3 feature-box">
        <i class="fas fa-calendar fa-3x feature-img"></i>
        <p>Keep a diary of your film watching</p>
      </div>
      <div class="col-md-3 feature-box">
        <i class="fas fa-th-large fa-3x feature-img"></i>
        <p>Keep a watchlist of films to see</p>
      </div>
    </div>
  </section>

  <!-- Social Media -->
  <footer id="footer">
    <a class="footer-logo" href="#"><i class="fab fa-twitter"></i></a>
    <a class="footer-logo" href="#"><i class="fab fa-facebook-f"></i></a>
    <a class="footer-logo" href="#"><i class="fab fa-instagram"></i></a>
    <a class="footer-logo" href="#"><i class="fas fa-envelope"></i></a>
    <p>© Copyright 2018 AfterNotes</p>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

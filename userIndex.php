<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Movie Mania</title>
  <link rel="stylesheet" href="user-home-page-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/735f3849e9.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <style media="screen">
  /* Go to the top of the page button*/
  #topbtn{
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #516BEB;
      border-radius: 50%;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
  }

  #topbtn:hover{
      background-color: #555;
  }
  </style>

</head>

<body>

  <!-- Scroll to the Top of the Page -->
  <button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>
  <script>
  var mybutton = document.getElementById("topbtn");
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  </script>

  <section class="container-fluid" id="title">

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="userIndex.php"><img src="imagesOld/movie_mania.png" height="18"> Movie Mania</a>

      <input id="search-input" type="search" id="form1" class="form-control w-25" />
      <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>



      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="DispMovies.php" style="color: #E26A2C;"><b>Movies</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php" style="color: #E26A2C;"><b>Profile</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php" style="color: #E26A2C;"><b>History</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" style="color: #E26A2C;"><b>About</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#download_buttons" style="color: #E26A2C;"><b>Download</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signout.php"><button class="btn btn-primary">SIGN OUT</button></a>
          </li>
        </ul>
      </div>

    </nav>
    <!-- Title -->
    <div class="row">
      <div class="col-lg-6">
        <h1 style="color:#9C19E0;">Hello <span style="color:#9C19E0;"><?php echo strtoupper($_SESSION['custName']) ?></span>! Book Movie Tickets with just one click!</h1>    <!--Write name after Hello using php and database-->
      </div>
      <div class="col-lg-6">
        <img src="imagesOld/title-img.png" alt="title-img" height="200" width="60%" style="border-radius:10%" />
      </div>
    </div>


  </section>

  <!-- Movies -->

  <section id="movies">

    <center>
      <h2 style="margin-bottom: 25px; color: #FCDEC0;">Recommended Movies</h2>
      <div class="row">

        <div class="col-lg-4">
          <a target="_blank" href="movie1.html">
          <img src="imagesOld/movie1.png" alt="Movie1" width="250" height="300">
        </a><br>
          <em><b>The Conjuring : The Devil Made Me Do It</b> </em><br>
          <em><b class="mv">Horror/Thriller</b></em><br>
          <b>Rating :</b> ⭐⭐⭐⭐<br />
          <b>Votes : 10K</b><br>
          <a  href="BookTicket.php?ids=1"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>

        <div class="col-lg-4">
          <a target="_blank" href="movie2.html">
          <img src="imagesOld/movie2.png" alt="Movie2" width="250" height="300">
        </a><br>
          <em><b class="mv">Eternals</b> </em><br>
          <em><b>Action/Adventure/Fantasy</b></em><br>
          <b>Rating :</b> ⭐⭐⭐⭐⭐<br />
          <b>Votes : 60K</b><br>
          <a  href="BookTicket.php?ids=2"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>

        <div class="col-lg-4">
          <a target="_blank" href="movie3.html">
          <img src="imagesOld/movie3.png" alt="Movie3" width="250" height="300">
        </a><br>
          <em><b class="mv">Ghostbusters : Afterlife</b> </em><br>
          <em><b>Action/Comedy/Fantasy</b></em><br>
          <b>Rating :</b> ⭐⭐⭐<br />
          <b>Votes : 15K</b><br>
          <a  href="BookTicket.php?ids=3"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>

        <div class="col-lg-4">
          <a target="_blank" href="movie4.html">
          <img src="imagesOld/movie4.png" alt="Movie4" width="250" height="300">
        </a><br>
          <em><b class="mv">Sooryavanshi</b> </em><br>
          <em><b>Action/Comedy/Drama</b></em><br>
          <b>Rating :</b> ⭐⭐⭐⭐⭐<br />
          <b>Votes : 125K</b><br>
          <a  href="BookTicket.php?ids=4"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>

        <div class="col-lg-4">
          <a target="_blank" href="movie5.html">
          <img src="imagesOld/movie5.png" alt="Movie5" width="250" height="300">
        </a><br>
          <em><b class="mv">Love Story</b> </em><br>
          <em><b>Drama/Romantic</b></em><br>
          <b>Rating :</b> ⭐⭐⭐⭐<br />
          <b>Votes : 48K</b><br>
          <a  href="BookTicket.php?ids=5"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>

        <div class="col-lg-4">
          <a target="_blank" href="movie6.html">
          <img src="imagesOld/movie6.png" alt="Movie6" width="250" height="300">
        </a><br>
          <em><b class="mv">Bell Bottom</b> </em><br>
          <em><b>Action/Thriller</b></em><br>
          <b>Rating :</b> ⭐⭐⭐<br />
          <b>Votes : 12K</b><br>
          <a  href="BookTicket.php?ids=6"><button class="BookNow">Book Tickets</button></a>
          <br><br>
        </div>


      </div>





    </center>

  </section>

<center>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagesOld/benefit1.png" class="d-block w-50" alt="..." height="500">
      </div>
      <div class="carousel-item">
        <img src="imagesOld/benefit2.png" class="d-block w-50" alt="..." height="500">
      </div>
      <div class="carousel-item">
        <img src="imagesOld/benefit3.png" class="d-block w-50" alt="..." height="500">
      </div>
    </div>
    <!-- aria-hidden="true" -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" ></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <section id="download_buttons">

    <button type="button" class="btn btn-outline-dark btn-lg"><i class="fab fa-apple"></i> Download</button>
    <button type="button" class="btn btn-outline-dark btn-lg"><i class="fab fa-google-play"></i> Download</button>

  </section>

  <!-- Footer -->
  <footer id="footer">

    <p>© Copyright 2021 Abhi-Akash Entertainment</p>

  </footer>

</center>
  <!-- Call to Action -->



</body>

</html>

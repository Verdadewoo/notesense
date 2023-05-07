<?php
# Initialize session
session_start();

# Check if user is already logged in, If yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
  echo "<script>" . "window.location.href='./'" . "</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoteSense</title>
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/notesense.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark nav-transparent px-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">// NOTESENSE </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0)">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notesense.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notesense.php#contact">Contact</a>
          </li>
        </ul>
        <div class="d-flex">
          <button class="btn text-white" type="button" onclick="window.location.href='login.php'">Sign in</button>
        </div>
      </div>
    </div>
  </nav>

  <div class="wrapper text-light">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">

          <!-- start of col content -->
          <div class="container ps-5">
            <p>#NoteSense</p>
            <h1 data-value="CREATE NOTES" class="h1-animate">CREATE NOTES</h1>
            <h1>AND JUST FLOW</h1>
          </div>
          <div class="container d-flex mt-3 ps-5">
            <div class="line me-3"></div>
            <div class="action-buttons">
              <h6>This is a simple note taking web app. This design is copied and inspired created by Ramotion on dribble.</h6>
              <button class="btn btn-success me-2 mt-3" onclick="window.location.href='register.php'">SIGN UP</button>
              <button class="btn btn-outline-light mt-3" onclick="window.location.href='login.php'">SIGN IN</button>
            </div>
          </div>
          <!-- end of col content -->

        </div>
        <div class="col-12 col-md-6 d-none d-sm-block">

          <!-- start of col content -->
          <div class="center">
            <lord-icon
              class="icon-main"
              src="https://cdn.lordicon.com/puvaffet.json"
              trigger="loop"
              colors="primary:#ffffff,secondary:#08a88a"
              style="width:20rem;height:20rem">
            </lord-icon>
          </div>
          <!-- end of col content -->

        </div>
      </div>
    </div>
  </div>

  <div class="wrapper-second" id="about">
    <div class="container text-center">
      <div class="row g-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 text-light text-align" data-aos="fade-right">
          <div class="circle">
            <lord-icon
              src="https://cdn.lordicon.com/wloilxuq.json"
              trigger="loop"
              delay="1000"
              colors="primary:#ffffff,secondary:#08a88a"
              style="width:3rem;height:3rem; margin-left: -0.05rem;">
            </lord-icon>
          </div>
          <p class="mt-3 text-about">This includes the basics of CRUD. The user can create, read, update, and delete data.</p>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 center">

          <div class="card" style="width: 18rem;" data-aos="fade-left" data-aos-duration="1000">
            <img src="img/bg_1.svg" class="card-img-top" alt="...">
            <div class="card-body text-align">
              <h5 class="card-title">Simple notes</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>

        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 center">
          
          <div class="card" style="width: 18rem;" data-aos="fade-left" data-aos-duration="1500">
            <img src="img/bg_2.svg" class="card-img-top" alt="...">
            <div class="card-body text-align">
              <h5 class="card-title">Open source</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>

        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 center">
          
          <div class="card" style="width: 18rem;" data-aos="fade-left" data-aos-duration="2000">
            <img src="img/bg_1.svg" class="card-img-top" alt="...">
            <div class="card-body text-align">
              <h5 class="card-title">Ongoing</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="footer text-light" id="contact">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          2023
        </div>
        <div class="col">
          jeffersonverdadero369@gmail.com
        </div>
      </div>
    </div>
  </div>
  
  
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    AOS.init();

    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    let interval = null;

    document.addEventListener("DOMContentLoaded", () => {
      const h1 = document.querySelector("h1");
      let interval = null;
      let iteration = 0;

      h1.innerText = h1.dataset.value;

      interval = setInterval(() => {
        h1.innerText = h1.innerText
          .split("")
          .map((letter, index) => {
            if (index < iteration) {
              return h1.dataset.value[index];
            }

            return String.fromCharCode(97 + Math.floor(Math.random() * 26));
          })
          .join("");

        if (iteration >= h1.dataset.value.length) {
          clearInterval(interval);
        }

        iteration += 1 / 3;
      }, 30);
    });

  </script>

</body>
</html>
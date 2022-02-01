<?php
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LoginSystem</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="./_sub_code/_logout.php">LogOut</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit" disabled>Search</button>
        </form>
        <div>
        <!-- Button trigger login modal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" style="margin: 2px 6px;" data-bs-target="#loginModal">
        Login
        </button>
        <!-- Button trigger login modal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"  data-bs-target="#signupModal">
        Sign-Up
        </button>
        </div>
        
        </div>
        </div>
        </nav>
        
        ';
        // <button class="btn btn-outline-success " style="margin: 2px 6px;"  type="button">Login</button>
        
        // <button class="btn btn-outline-success " type="button">Sign Up</button>

?>        
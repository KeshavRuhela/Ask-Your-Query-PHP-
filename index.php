<?php
session_start();
// echo var_dump($_SESSION['firstLogin']);

?>
<!doctype html>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  
  <title>Ask Your Doubt</title>
  <style>
    
    </style>
</head>

<body>
  <?php require '_sub_code/_dbconnection.php' ?>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // require "./sub_code/_dbconnection.php";
      $username = $_POST['username'];
      $emailid = $_POST['emailid'];
      $pass = $_POST['pass'];
      $confpass = $_POST['confpass'];
      $address = $_POST['address'];
      $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $existuser = "SELECT * from users WHERE user_name = '$username' || email = '$emailid' ";
        $executeing = mysqli_query($connecting, $existuser);
        $count = mysqli_num_rows($executeing);
        if ($count == null) {
          if ($pass  ==  $confpass) {
            $passhash = password_hash($pass, PASSWORD_DEFAULT);
            // echo $username, " | ",$emailid, " | ",$pass, " | ",$confpass, " | ",$address, " | ",$city, " | ",$state, " | ",$zip;
            $inpt_record = "INSERT INTO users (user_name, email, password, address, city, state, zip) VALUES('$username', '$emailid', '$passhash', '$address', '$city', '$state', '$zip')";
            $execute = mysqli_query($connecting, $inpt_record);
            if ($execute) {
              echo '<div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
                <strong>Sucessful ! Now you are able to login our site.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
              echo "error ! " . mysqli_error($connecting);
            }
          } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
            <strong>Warning ! Entered Password and Confirm Passwoord do not match.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        } else {
          echo '<div class="alert alert-warning alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
            <strong>Warning ! Name / Email is already taken. Use different name / email.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      }
?>  
<?php
if (isset($_SESSION['firstLogin'])){
  if ($_SESSION['firstLogin'] == true) {
    echo '<div class="alert alert-primary alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
    <strong>Warning ! Login again.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    $_SESSION['firstLogin'] = false;
    // echo 'firstlogin';

  }
}
if (isset($_SESSION['$warning'])) {
  if ($_SESSION['$warning'] == true) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
          <strong>Warning ! User name or password do not match.</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          $_SESSION['$warning'] = false;
          // echo 'warning'; 

  }
}

if (isset($_SESSION['$warning2'])) {
  if ($_SESSION['$warning2'] == true) {
    echo '<div class="alert alert-warning alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
          <strong>Warning ! User name does not exist.</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          $_SESSION['$warning2'] = false;
          // echo 'warning2';

  }
}
if (isset($_SESSION['use'])){
  if ($_SESSION['use'] == true) {
    echo '<div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0px;" role="alert">
          <strong>Success ! Now you can post Query and answer to Query.</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          $_SESSION['use'] = false;
          // echo 'now';

  }
}
?>
<?php require "_sub_code/_navbar.php" ?>
  <?php require '_sub_code/_modal.php' ?>
  <?php require '_sub_code/_slider.php' ?>



  <div class="container my-3">
    <h2 class="text-center">Categories For Discuss</h2>
  </div>


  <div class="container ">
    <div class="row d-flex  ">




      <?php
      $cards_query = "SELECT * FROM category";
      $result_cards_query = mysqli_query($connecting, $cards_query);
      // echo var_dump($fetch_cards_query);
      // echo "<br>";
      // $fetch_cards_query = mysqli_fetch_assoc($result_cards_query);
      // echo var_dump($fetch_cards_query);
      $change_img = 1;
      while ($fetch_cards_query = mysqli_fetch_assoc($result_cards_query)) {
        // echo var_dump($fetch_cards_query);
        // echo "<br>";
        // echo var_dump($fetch_cards_query['category_id']);
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        echo '<div class=" col-md-3 my-2" style="text-align: -webkit-center;">
                <div class="card" style="width: 15rem; box-shadow: 2px 2px 15px -2px;">
                  <img src="./img/' . $change_img . '.jfif" class="card-img-top" alt="...">
                  <div class="card-body" style="text-align:justify;">
                    <h5 class="card-title">' . $fetch_cards_query["category_name"] . '</h5>
                    <p class="card-text">' . substr($fetch_cards_query["category_desc"], 0, 85) . ' . . .</p>
                    <a href=view_threats.php?catagory_id_to_view='.$fetch_cards_query["category_id"].' class="btn btn-primary">Full View</a>
                  </div>
                </div>
              </div>';
        $change_img += 1;
      }
      ?>
    </div>
  </div>






  <!-- footer start from here -->
  <div class="container-fluid bg-dark text-center text-light py-1">
    <?php
    $date = date("Y");
    $nextdate = $date + 1;
    echo "All Copyrights $date" . ' - ' . " $nextdate reserverd (KESHAV RUHELA)";
    ?>
  </div>
  <!-- <?php require '_sub_code/_footer.php' ?> -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>
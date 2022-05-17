<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acount Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- logo image -->
  <link rel="icon" href="../logo.jpg" type="jpg">
  <?php require "_bootstrap_starter_template.php"; ?>
  <style>
    .hover_acount_query:hover {
      background: #7fffd4c7;
    }
    .writen_query{padding: 5px; border-radius: 8px; background: transparent; font-weight: 500; margin: 5px;}
    .writen_query:hover {background:#413f3fd6 !important; color: white;}
    .spin_loader{
      display: none;
    }
  </style>
</head>

<body>


  <?php
  session_start();
  require "_acount_navbar.php";
  require "_acount_login.php";

  if (isset($_SESSION['use'])) {
    // echo "<h1>now you can show details.</h1>";

    require '_dbconnection.php';

    $query = "select * from add_query where user_id=" . $_SESSION['userid'] . ";";
    $user_query = "select * from users where userid=" . $_SESSION['userid'] . ";";
    $execute = mysqli_query($connecting, $query);
    $user_execute = mysqli_query($connecting, $user_query);
    $row = mysqli_num_rows($execute);
    $res = mysqli_fetch_assoc($user_execute);
    // print_r($res);
    echo '<div class="card m-3" style="max-width: 90%;left: 10%; max-width: 90%;background:#f9f9e6; display: flex; position: absolute; right: 10%;">
    <div class="row g-0">
      <div class="col-md-4" style="align-self:center; text-align:center;">
        <img style="max-width:70%;" src="../img/user_default_img.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Account Details :</h5>
          <p class="card-text"><a style="font-weight:600;">User Name</a> : '. $res["user_name"].'</p>
          <p class="card-text"><a style="font-weight:600;">Email </a>: '. $res["email"].'</p>
          <p class="card-text"><a style="font-weight:600;">Pass</a> : *********</p>
          <p class="card-text">City : '. $res["city"].'<a style="font-weight:600;"> Postal Code </a> : '.$res["zip"].'</p>
          <p class="card-text"><a style="font-weight:600;"> State </a> : '.$res["state"].'<a style="font-weight:600;"> Country </a>: '. $res["address"].'</p>

          <p class="card-text"><small class="text-muted">Accont was created on '.$res["datetime"].'</small></p>
        </div>
      </div>
    </div>
    <div style="position: relative;top: 50px;" ><button onclick="arr('.$res["userid"].')" class="writen_query"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">written queries</button><button  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="writen_query" onclick="answer('.$res["userid"].')">written Answer</button></div>
    
  </div>
  ';

  // buttons

  echo '
    <div class="offcanvas offcanvas-end" style="width:50%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Written Answer</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div id="answer_card"></div>
      </div>
    </div>



    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Written   Query</h5>
      </div>
      <div id="query_card" style="overflow:auto;"></div>
    </div>';
          
  } else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#loginModal">login!</strong> You Not Login Yet.
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    <div style="text-align:center !important;"><img src="../logo.jpg" width="80%" alt="ProSolv" /></div>
  ';
  }


  // session_destroy();
  ?>

</body>

<script src="../jquery.js"></script>
<script>
  function deletequery(qury) {
    var a = '{"sno":"'+qury+'"}';
    console.log(a);
    var del = confirm("Do you realy want to delet qyery");
    if(del){
    $.ajax({
      url: "http://localhost/forms/api/_delet_query.php",
      type: "POST",
      data: a,
      beforeSend:function(){
        $('.spin_loader').show();
      },
      success: function(data) {
        console.log(data,a);
        $('.spin_loader').hide();

      }
    });
    }
  }

  // written queries fetch
  function arr(no){
    console.log(no);
    var dat = '{"sno":"'+no+'"}';
    console.dir(dat);
    $.ajax({
      url:"http://localhost/forms/api/_written_query.php ",
      method:"POST",
      data : dat,
      beforeSend:function(){
        
      },
      success:function(data){
        
        $('#query_card').html(data);
    }
  });
  }

  // written Answer fetch
  function answer(so){
    console.log(so);
    var dat = '{"sno":"'+so+'"}';
    console.dir(dat);
    $.ajax({
      url:"http://localhost/forms/api/_writen_answer.php ",
      method:"POST",
      data : dat,
      beforeSend:function(){
        
      },
      success:function(data){
        
        $('#answer_card').html(data);
    }
  });
  }

</script>

</html>

<?php require '_sub_code/_dbconnection.php';
session_start();
$firstlog =false;
$catid = $_SESSION['catidsession'] ;
$warning = false;
$firstlog = false;
if(isset($_SESSION['check'])){
    if ($_SESSION['check'] == true){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // echo "sql query";
            $query_reply = $_POST['reply'];
            $query_reply =str_replace("<","&lt;",$query_reply);
            $query_reply =str_replace(">","&gt;",$query_reply);
            // $query_tit = $_POST['Query_title'];
            $set_query_user = "SELECT * FROM users WHERE user_name = '$_SESSION[userInfo]' || email = '$_SESSION[userInfo]' ";
            $result_set_query_user = mysqli_query($connecting, $set_query_user);
            $fetch_set_query_user = mysqli_fetch_assoc($result_set_query_user);

            $set_query_dublacy = "SELECT * FROM replies WHERE reply = '$query_reply' ";
            $result_set_query_dublacy = mysqli_query($connecting, $set_query_dublacy);
            $row = mysqli_num_rows($result_set_query_dublacy);
            // echo $row_query_tit ;
        if ($row == null ){
            // echo 'hello';
            $set_query = "INSERT INTO replies (reply, category_id, R_user_id , R_user_name) VALUES ('$query_reply',$catid ,$fetch_set_query_user[userid] , '$fetch_set_query_user[user_name]' ) ";
            //  echo $set_query;   
            $result_set_query = mysqli_query($connecting, $set_query);
            //  echo $set_query;
                if ($result_set_query){
                //  echo "error";   
                }
                else{
                    //  echo "error".mysqli_error($connecting) ; 
                }
                // $fetch_set_query = mysqli_fetch_assoc($result_set_query);
        }
        else{
            $warning = true;
        }
        }
    }
}
else{
    $firstlog = true;
    $catid =null;
}


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
    <!-- Bootstrap CSS 4.6 -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

    <!-- Bootstrap CSS 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Ask Your Query</title>
    <style>
        /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #198754;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
.overunderline{
    text-decoration: none;
    font-size: 15px;
}
/* .overunderline:hover{
    text-decoration: underline;
} */
    </style>
</head>

<body>
    <?php require "_sub_code/_navbar.php";
        if ($firstlog){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning ! You are not login yet.<a style="color:#02025c;"> Try to Login First.</a> </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    ?>


  <?php require '_sub_code/_modal.php' ?>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $catid = $_GET['sno'];
        $_SESSION['catidsession'] = $catid;
        // echo $_SESSION['catidsession'];
    }
if ($catid){

}else{
    $catid = 0;
}
    $heading_name_query = "SELECT * FROM add_query WHERE Sno = $catid ";
    $result_heading_name_query = mysqli_query($connecting, $heading_name_query);
    $fetch_heading_name_query = mysqli_fetch_assoc($result_heading_name_query);
    $fetch_userid = $fetch_heading_name_query["user_id"] ;
    
if ($catid !=0){
    $user_name_query = "SELECT * FROM users WHERE userid = $fetch_userid ";
    // echo $user_name_query;
    $result_user_name_query = mysqli_query($connecting, $user_name_query);
    $fetch_user_name_query = mysqli_fetch_assoc($result_user_name_query);
    // echo var_dump($fetch_user_name_query);
    
    if ($fetch_user_name_query){
    //   echo "good";
    }
    else{
        //  echo mysqli_error($connecting);
    }
}
else{
    $fetch_user_name_query["user_name"] = "First Login Our site.";
}
    echo '
    <div class="">

    <!--<img src=./img/.jfif width="100%" height="500px"  alt="" srcset="">-->
    
    </div>
    <div class="container my-4">
        <div class="p-5 mb-4 text-light rounded-0" style="background-color: #198754b3;">
        
        <img src="./img/user_default_img.png" width="50px" height="50px" alt="..."><a style="background-color:gray; text-align:center; padding:5px;  width:200px; ">'.$fetch_user_name_query["user_name"].'</a>
        
        <div class="container-fluid py-0 " >
        <h3 style="color:black;" class="my-0">Query :</h3>
        <h3 class="display-5 fs-2 "style="color:#751a1a; font-weight:400;"  >' . $fetch_heading_name_query["query_title"] . '</h3>
                <p class="col-md-8 fs-4" style="text-align:justify;" >' . $fetch_heading_name_query["query_desc"] . '</p>
            </div>
            <footer class="py-3 fs-5" style="border-top: 1px solid red;">
                Read all rules before posting any comment.

        <button class="btn fs-6 btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#rule" aria-controls="rule">
        Rules
        </button>

        <div class="offcanvas offcanvas-start text-dark" tabindex="-1" id="rule" aria-labelledby="ruleLabel"  >
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="ruleLabel">Comment Rules</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
            <ul><li>Be polite.  It never hurts to be nice, and you\'ll be much more likely to get a useful response when you\'re civil.</li>
            <li>Be genuine. You can use your real name or a comfortable pseudonym--just act like yourself. Don\'t hate or imitate.</li>
            <li>Have fun. Put on your comfy pants, and make yourself at home.</li>
            <li>Think, then speak. We like people who are curious, eager, and creative. Have a comment? Got a question? Post it. Someone else is wondering the very same thing.</li>
            <li>Consider <a href="http://en.wikipedia.org/wiki/Godwin%27s_law" target="_blank" title="Godwin\'s Law">Godwin\'s Law</a> in effect. First to violate it loses, and the conversation is over.</li>
        </ul><p><strong>You should not:</strong></p>

        <ul><li>Use inappropriate language or provide links/trackbacks to obscene or inappropriate content. This includes using obscenities as well as being just plain mean.</li>
            <li>Defame an individual or group, or violate any trademarks or copyrighted material.</li>
            <li>Upload or link to viruses or other malicious code.</li>
            <li>Encourage or advocate illegal activity or propose illegal activity.</li>
            <li>Violate the privacy of others.</li>
            <li>Promote commercial services or products.</li>
            <li>Feed the trolls. It only encourages them.</li>
        </ul>
            </div>
            </div>
        </div>
        </div>
            </footer>
        </div>
    </div>
    ';
    
     
    
    
    ?>

    <!-- <?php require '_sub_code/_all_comments.php' ?> -->
        
    



    <?php
    echo "<h2 class='text-center mb-3'>Replies</h2>";
        // echo $_SESSION['catidsession'];
        $read_threat = "SELECT * FROM replies WHERE category_id = $_SESSION[catidsession] ";
        $result_read_threat = mysqli_query($connecting , $read_threat);
        
        while ($fetch_read_threat = mysqli_fetch_assoc($result_read_threat)){
            echo '
            <div class="container my-2 py-2" style="background-color:#85848457; border-radius: 0px 25px 0px 25px;">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <img src="./img/user_default_img.png" width="40px" height="40px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <h4><a class="text-dark overunderline"><pre>'.$fetch_read_threat["reply"].'</pre></a></h4>
                       <a class="text-success" style=""> '.$fetch_read_threat["R_user_name"].'</a>
                       <a style="font-size:13px; padding-right:10px; position: sticky; left: 75vw; top: -3px;">'.$fetch_read_threat["reply_datetime"].'</a>
                    </div>
                </div>
            </div>
                ';
        }

        if ($warning){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning ! This Query is allready exists.<a style="color:#02025c;"> Try to search it.</a> </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }

    echo '
    <!-- login form -->
    <div class="container">
    <h3 class = "my-3">Add your Reply: <label class="fs-6 mx-3 text-danger" style="word-spacing:8px;">You need to login first.</label></h3>
    <div class="container" style="width:80%;">


        <form class="row g-3 my-3" action=\'./single_threats_view.php\' method="POST" >
        <div class="col-md-6">
            <label for="Query_title" class="form-label" style="font-weight:500;">Reply : </label>
            <textarea name="reply" id="reply" class="form-control" cols="50" style="width:60vw;" required rows="10"></textarea>
            
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>

        </div>
        </div>
    ';
?>









    <!-- <div class="container my-4">
        <div class="p-5 mb-4 text-light rounded-0" style="background-color: #52959a;">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </div>
    </div> -->

    <!-- jumbotron 4.6 bootstrap require -->
    <!-- <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div> -->


    <!-- footer start from here -->
    <div class="container-fluid bg-dark text-center text-light py-1">
        <?php
        $date = date("Y");
        $nextdate = $date + 1;
        echo "All Copyrights $date" . ' - ' . " $nextdate reserverd (KESHAV RUHELA)";
        ?>
    </div>
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
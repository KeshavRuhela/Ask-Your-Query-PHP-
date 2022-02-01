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
            // echo $set_query;
                if ($result_set_query){
                 echo "error";   
                }
                else{
                     echo "error".mysqli_error($connecting) ; 
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
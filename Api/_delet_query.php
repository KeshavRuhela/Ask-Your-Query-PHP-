<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Method,Authorization,X-Requested-With');

    require "../_sub_code/_dbconnection.php";

    $data = json_decode(file_get_contents("php://input"),true);
    
    $id = $data["sno"];
    echo $id;
    $sql_command = "DELETE FROM add_query WHERE Sno= $id";

    if (mysqli_query($connecting, $sql_command)){
        $default_arr = array("message"=>"Data is Deleted Successfully","status"=>True);
        $default_json_msg = json_encode($default_arr);
        echo $default_json_msg;
        echo var_dump($data);
    }else{
        $default_arr = array("message"=>"Data is not Deleted","status"=>false);
        $default_json_msg = json_encode($default_arr);
        echo $default_json_msg;
        echo var_dump($data["sno"]);
        }
    
    require "../_sub_code/_disconnect_db.php";
    

 
?>
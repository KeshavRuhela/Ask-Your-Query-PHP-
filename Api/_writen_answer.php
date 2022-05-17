<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Method,Authorization,X-Requested-With');

    require "../_sub_code/_dbconnection.php";

    $data = json_decode(file_get_contents("php://input"),true);
    
    $id = $data["sno"];
    
    $query = "select * from replies where R_user_id=$id";

    if ($execute = mysqli_query($connecting, $query)){
        
        if ($row = mysqli_num_rows($execute) >0){
            // $qury_data = mysqli_fetch_all($execute,MYSQLI_ASSOC);
            // $qury_json_data = json_encode($qury_data);
            // echo $qury_json_data;
            while ($result = mysqli_fetch_assoc($execute)){
                // print_r($result);
                echo '<div class="card border-success m-3" style="max-width: 90%;">
                    <div onclick="deletequery(' . $result["R_sno"] . ')" class="card-header bg-transparent border-success" style="text-align:center; cursor:pointer; font-weight:700; color:white; letter-spacing:1.3; background:red !important;">Delete</div>
                    
                    <div class="spinner-border spin_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>  
                    
                    <div class="card-body text-success">
                        <h5 class="card-title">' . $result["reply"] . '</h5>
                        <p style="text-align:end;font-size:14px;">' . $result["reply_datetime"] . '</p>
                    </div>
                    <a href = "../single_threats_view.php?sno='.$result["category_id"].'"class="text-dark overunderline"><div class="card-footer bg-transparent border-success" style="font-weight:bold; cursor:pointer;">View <font style="text-align:end; display:block;">&#10140;</font></div></a>
                    </div>';
            }
        }
    }
    else{
        $default_arr = array("message"=>"No Data Found","status"=>false);
        $default_json_msg = json_encode($default_arr);
        // echo $default_json_msg;
        // echo var_dump($data["sno"]);
        }

    require "../_sub_code/_disconnect_db.php";

?>
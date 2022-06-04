<?php
    require_once "../commons/dbconfig.php";
    if(isset($_POST['id'])){
        $sanitized_id_client = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM clients WHERE id = ?";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"i",$sanitized_id_client);
        $status = mysqli_stmt_execute($stmt);
        if($conn->affected_rows==1){
            $status_code = 1;
        }else{
            $status_code = 0;
        }
    }
    header('Content-Length: '.strlen($status_code));
    header('Content-type: application/json');
    echo json_encode(array("status_code"=>$status_code));
?>
<?php
require 'connection.php';

if(isset($_GET['q'])){
    $q = $_GET['q'];
    $stmt = $connect->prepare("SELECT * FROM City WHERE Title LIKE ?");
    $param = "%$q%";
    $stmt -> bind_param("s", $param);
    $data = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $id = $row['Id'];
                $city = $row['Title'];
                $data[] = array('id'=>$id, 'text'=>$city);
            }
            $stmt->close();
        }else{
            $data[] = array('id'=>0, 'text'=>'Город не найден');
        }
        echo json_encode($data);
    }
}
?>
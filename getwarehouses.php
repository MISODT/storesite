<?php

require 'connection.php';

$warehouses = mysqli_query($connect, "SELECT * FROM Warehouse");

while($warehouse = mysqli_fetch_assoc($warehouses)){
    $warehousesmas[] = $warehouse;
}
$warehousesar['Warehouses'] = $warehousesmas;

echo json_encode($warehousesar, JSON_UNESCAPED_UNICODE);

?>

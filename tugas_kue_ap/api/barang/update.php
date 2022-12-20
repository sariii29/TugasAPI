<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$nama_kue = $data->$nama_kue;
$harga = $data->harga;
$id = $data->id;

$hasil["update success"] = false;
$hasil["data"] = array();

$update_sql = "UPDATE barang SET nama_kue='$nama_kue', harga='$harga' where id=$id";
$result = mysqli_query($connection,$update_sql);
if($result){
    $hasil["update success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);

?>
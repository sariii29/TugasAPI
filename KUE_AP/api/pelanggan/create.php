<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$nama = $data->nama;
$alamat = $data->alamat;
$tanggal_beli = $data->$tanggal_beli;
$barang_id = $data->barang_id;

$hasil["success"] = false;
$hasil["data"] = array();

$insert_sql = "INSERT INTO pelanggan VALUES ('$nama','$alamat','$tanggal_beli',$bagian_id)";
$result = mysqli_query($connection, $insert_sql);
if ($result) {
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);
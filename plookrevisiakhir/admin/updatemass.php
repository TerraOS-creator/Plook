<?php 
require_once ('../Controller/connection.php');
$query="UPDATE hotels SET description=? where gambar=?";
$description='{"nama":"Grand Mercure Hotel",
    "description1":{"type":"Superior room","bed":"single queen bed","bedQuantity":"1","price":1340680,"maximum":"1","luas":"32m","fasilitas":{"1":"tanpa sarapan","2":"tanpa wifi"}},
    "description2":{"type":"Premier room","bed":"king bed","bedQuantity":"2","price":1540680,"maximum":"2","luas":"34m","fasilitas":{"1":"tanpa sarapan","2":"tanpa wifi"}}
    }';

$nama="grandmercure.jpg";
$result=$connection->prepare($query);
$result->bind_param("ss",$description,$nama);
$result->execute();
echo "success";
$result->close();
?>
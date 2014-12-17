<?php
header('Content-Type: text/html , charset : utf-8');
include('connect.php');

$sql_localidades = 'SELECT * from localidades';

$stmt = $pdo_obj->prepare('Select * from localidades WHERE id = :id ');
$stmt->bindParam(':id', $_GET['id'],PDO::PARAM_STR );
$stmt->execute;

$result = $stmt->fetchAll();

print_r($result);

?>
<?php
include('connect.php');



$id = htmlspecialchars($_GET['id']);

foreach ($pdo_obj->query("SELECT * FROM localidades WHERE municipio_id = $id ") as $row) {
?>
    <option value="<?= $row['id'] ?>"><?php echo $row['nombre']; ?></option>
<?

}
                     
$pdo_obj = null;

?>
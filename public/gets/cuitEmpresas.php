<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT cuit FROM empresa WHERE id_transp = '$id_transp'");

while ($fila = mysqli_fetch_array($consulta)) { ?>
    <option name="cuit" value="<?php echo $fila['cuit']; ?>"><?php echo $fila['cuit']; ?></option>;
<?php

}

?>
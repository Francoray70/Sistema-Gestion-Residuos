<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$gener_nom = $_POST['gener_nom'];

$consulta = mysqli_query($conexion, "SELECT * FROM manifiesto INNER JOIN manifiestodet on manifiesto.id_manifiesto = manifiestodet.id_manifies
    WHERE gener_nom = '$gener_nom' and estadoo = 'ALTA' and nro_cert_disp_final = '' ORDER BY id_manifiesto asc");

$html = "<option value=''>Seleccionar manifiesto</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
    <option name="direccion" value="<?php echo $fila['id_manifiesto']; ?>"><?php echo $fila['id_manifiesto']; ?></option>;
<?php } ?>
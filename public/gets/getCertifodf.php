<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_operador_df = $_POST['id_operador_df'];

$consulta = mysqli_query($conexion, "SELECT hab_pro_nro_odf,cdf_actual FROM operadordispfinal WHERE id_operador_df = '$id_operador_df'");

$fila = mysqli_fetch_array($consulta); ?>

<option name="ciudad" value="<?php echo $fila['hab_pro_nro_odf']; ?>-<?php echo $fila['cdf_actual']; ?>"><?php echo $fila['hab_pro_nro_odf']; ?>-<?php echo $fila['cdf_actual']; ?></option>
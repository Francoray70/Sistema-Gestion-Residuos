<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename= librooperadoresdispfinal.xls");
?>

<?php
$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");


$consulta = mysqli_query($conexion, "SELECT * FROM certifdispfinal INNER JOIN certifdispfinaldetalle ON certifdispfinal.nro_cert_disp_final = certifdispfinaldetalle.numero_certif
    WHERE opdfinal = '$operador' AND fechacertificado >= '$fechainicio' and fechacertificado <= '$fechafinal' ORDER BY nro_cert_disp_final");
mysqli_set_charset($conexion, "utf8");

mysqli_set_charset($conexion, "utf8");
?>
<table border=1 bgcolor="white" align="center">
    <tr>
        <th colspan=10 class="titulos"><b>CERTIFICADOS DE: <?php echo $operador; ?></b></th>
    </tr>
    <tr>
        <th class="titulos"><b class="titulos2">OPERADORA</b></th>
        <th class="titulos"><b class="titulos2">NUM. CERTIFICADO</b></th>
        <th class="titulos"><b class="titulos2">NUM. MANIFIESTO</b></th>
        <th class="titulos"><b class="titulos2">FECHA ALTA</b></th>
        <th class="titulos"><b class="titulos2">GENERADOR</b></th>
        <th class="titulos"><b class="titulos2">CORRIENTE</b></th>
        <th class="titulos"><b class="titulos2">UM</b></th>
        <th class="titulos"><b class="titulos2">CANTIDAD</b></th>
        <th class="titulos"><b class="titulos2">ESTADO</b></th>
        <th class="titulos"><b class="titulos2">TRANSPORTISTA</b></th>
    </tr>

    <?php
    while ($fila = mysqli_fetch_array($consulta)) { ?>
        <tr>
            <td class="titulos3"><?php echo $fila['opdfinal']; ?></td>
            <td class="titulos3"><?php echo $fila['nro_cert_disp_final']; ?></td>
            <td class="titulos3"><?php echo $fila['num_manifiesto']; ?></td>
            <td class="titulos3"><?php echo date("d-m-Y", strtotime($fila['fechacertificado'])); ?></td>
            <td class="titulos3"><?php echo $fila['generador']; ?></td>
            <td class="titulos3"><?php echo $fila['corriente']; ?></td>
            <td class="titulos3"><?php echo $fila['um']; ?></td>
            <td class="titulos3"><?php echo $fila['cantidad']; ?></td>
            <td class="titulos3"><?php echo $fila['estado']; ?></td>
            <td class="titulos3"><?php echo $fila['transportista']; ?></td>
        </tr>
    <?php } ?>

</table>

<?php
if ($manifiesto) {
    require __DIR__ . '/fpdf184/fpdf.php';

    class PDF extends FPDF
    {
        function Header()
        {

            $conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");


            $consulta1 = mysqli_query($conexion, "SELECT * FROM manifiesto WHERE id = '$manifiesto'");

            while ($filonga = mysqli_fetch_array($consulta1)) {
                $manifiestoooo = $filonga['id_manifiesto'];
                $transportistaaaaa = $filonga['id_transp'];
            }

            $this->SetFont('Arial', 'I', 8); //Establecemos tipo de fuente, negrita y tamaño 16
            //Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha
            $this->Ln(0);
            $this->Cell(105);
            $this->Cell(40, 10, 'MANIFIESTO DE TRANSPORTE DE RESIDUOS PELIGROSOS', 0, 0, 'P');


            $this->Ln(5);
            $this->Cell(170);
            $this->Cell(100, 10, utf8_decode('LEY XI N°35'), 0, 0, 'P');

            $this->SetFont('Arial', 'B', 12);
            $this->Ln(5);
            $this->Cell(120);
            $this->Cell(100, 10, utf8_decode('N°: ' . $manifiestoooo), 0, 0, 'P');

            $this->SetFont('Arial', 'B', 9);
            $this->Ln(6);
            $this->Cell(120);
            $this->Cell(100, 10, utf8_decode('EMPRESA: ' . $transportistaaaaa), 0, 0, 'P');

            $this->Ln(0);
            $this->Image('imagenes/logochubut.png', 18, 3, 60);

            $this->Ln(0);
            $this->Cell(70);
            $this->image('tempo/' . $manifiestoooo . 'manifiesto.png', 82, 6, 30);

            $this->Ln(10);
        }
    }
    $conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");


    $consulta = mysqli_query($conexion, "SELECT * FROM manifiesto WHERE id = '$manifiesto'");
    while ($row = mysqli_fetch_array($consulta)) {
        $manifiestonumero = utf8_decode($row['id_manifiesto']);
        $transporte = utf8_decode($row['id_transp']);
        $nombre = utf8_decode($row['nom_comp']);
        $operador = utf8_decode($row['gener_nom']);
        $retiro = utf8_decode($row['retiro_direc']);
        $inhalacion = utf8_decode($row['inhalacion']);
        $dermica = utf8_decode($row['dermica']);
        $oral = utf8_decode($row['oral']);
        $inflamabilidad = utf8_decode($row['inflamabilidad']);
        $reactividad = utf8_decode($row['reactividad']);
        $toxicidad = utf8_decode($row['toxicidad']);
        $inst_esp = utf8_decode($row['inst_esp']);

        $manipulacion = utf8_decode($row['manipulacion']);
        $planes = utf8_decode($row['planes']);
        $rol = utf8_decode($row['rol']);
        $hoja = utf8_decode($row['hoja']);
        $rutas = utf8_decode($row['rutas']);

        $retiro_direc = $row['retiro_direc'];
        $fecha = date("d-m-Y", strtotime($row['fecha_alta_manif']));

        $chofer = $row['chofer'];
        $patente = $row['id_patente'];
    }

    $consulta2 = mysqli_query($conexion, "SELECT * FROM manifiestodet WHERE id_manifies = '$manifiestonumero'");

    $generador = mysqli_query($conexion, "SELECT * FROM generador WHERE nom_comp = '$nombre'");
    while ($filita = mysqli_fetch_array($generador)) {
        $cuit = utf8_decode($filita['cuit']);
        $nombregene = utf8_decode($filita['nom_comp']);
        $habilitacion = utf8_decode($filita['cli_nro_hab_mun']);
        $vencimiento = utf8_decode(date("d-m-Y", strtotime($filita['cli_vto_hab_mun'])));
    }

    $transportista = mysqli_query($conexion, "SELECT * FROM transportes WHERE id_transp = '$transporte'");
    while ($fililla = mysqli_fetch_array($transportista)) {
        $transpor = utf8_decode($fililla['id_transp']);
        $cuittransporte = utf8_decode($fililla['cuit_trans']);
        $habilittransporte = utf8_decode($fililla['trans_num_hab_mun']);
        $vtotransporte = utf8_decode(date("d-m-Y", strtotime($fililla['trans_vto_hab_mun'])));
    }

    $geneprincipal = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom = '$operador'");
    while ($fil = mysqli_fetch_array($geneprincipal)) {
        $oper = utf8_decode($fil['gener_nom']);
        $cuitt = utf8_decode($fil['gener_cuit']);
        $habi = utf8_decode($fil['gener_nro_hab_pro']);
        $venci = utf8_decode(date("d-m-Y", strtotime($fil['gener_vto_hab_pro'])));
    }

    $vehiculo = mysqli_query($conexion, "SELECT * FROM camiones WHERE id_patente = '$patente'");
    while ($raw = mysqli_fetch_array($vehiculo)) {
        $cam1 = utf8_decode($raw['tipo_vehiculo']);
        $cam2 = utf8_decode($raw['descripcion_vehiculo']);
        $cam3 = utf8_decode($raw['id_patente']);
        $cam4 = utf8_decode($raw['pat_cpel_nro']);
        $cam5 = utf8_decode(date("d-m-Y", strtotime($raw['pat_cpel_vto'])));
    }

    $choferes = mysqli_query($conexion, "SELECT * FROM choferes WHERE chofer = '$chofer'");
    while ($ral = mysqli_fetch_array($choferes)) {
        $cho1 = utf8_decode($ral['chofer']);
        $cho2 = utf8_decode($ral['nro_carnet']);
        $cho3 = utf8_decode(date("d-m-Y", strtotime($ral['carga_pelig_vto'])));
    }


    $pdf = new PDF(); //Creamos un objeto de la librería
    $pdf->AddPage(); //Agregamos una Pagina


    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->SetFillColor(232, 232, 232);
    $pdf->Cell(175, 5, '1.DATOS IDENTIFICATORIOS', 1, 1, 'P');
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 5, '', 1, 0, 'P');
    $pdf->Cell(50, 5, utf8_decode('DENOMINACIÓN'), 1, 0, 'C');
    $pdf->Cell(38, 5, utf8_decode('C.U.I.T.'), 1, 0, 'C');
    $pdf->Cell(25, 5, utf8_decode('RPGyOSP N°'), 1, 0, 'C');
    $pdf->Cell(30, 5, utf8_decode('VIGENCIA'), 1, 0, 'C');



    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->Cell(32, 7, 'GENERADOR', 1, 0, 'P');
    $pdf->Cell(50, 7, $nombregene, 1, 0, 'P');
    $pdf->Cell(38, 7, $cuit, 1, 0, 'C');
    $pdf->Cell(25, 7, $habilitacion, 1, 0, 'C');
    $pdf->Cell(30, 7, $vencimiento, 1, 0, 'C');


    $pdf->Ln(7);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 7, 'TRANSPORTISTAS', 1, 0, 'P');
    $pdf->Cell(50, 7, $transpor, 1, 0, 'P');
    $pdf->Cell(38, 7, $cuittransporte, 1, 0, 'C');
    $pdf->Cell(25, 7, $habilittransporte, 1, 0, 'C');
    $pdf->Cell(30, 7, $vtotransporte, 1, 0, 'C');


    $pdf->Ln(7);
    $pdf->Cell(10);
    $pdf->Cell(32, 7, 'OPERADOR', 1, 0, 'P');
    $pdf->Cell(50, 7, $oper, 1, 0, 'P');
    $pdf->Cell(38, 7, $cuitt, 1, 0, 'C');
    $pdf->Cell(25, 7, $habi, 1, 0, 'C');
    $pdf->Cell(30, 7, $venci, 1, 0, 'C');


    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, '2.TRANSPORTISTA', 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(45, 5, utf8_decode('VEHÍCULO'), 1, 0, 'C');
    $pdf->Cell(30, 5, utf8_decode('TIPO'), 1, 0, 'C');
    $pdf->Cell(20, 5, utf8_decode('DOMINIO'), 1, 0, 'C');
    $pdf->Cell(46, 5, utf8_decode('N° REG. TRANSP. CARGAS PEL.'), 1, 0, 'P');
    $pdf->Cell(34, 5, utf8_decode('VIGENCIA'), 1, 0, 'C');


    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->Cell(45, 7, strtoupper($cam1), 1, 0, 'P');
    $pdf->Cell(30, 7, strtoupper($cam2), 1, 0, 'P');
    $pdf->Cell(20, 7, $cam3, 1, 0, 'C');
    $pdf->Cell(46, 7, $cam4, 1, 0, 'C');
    $pdf->Cell(34, 7, $cam5, 1, 0, 'C');


    $pdf->Ln(7);
    $pdf->Cell(10);
    $pdf->Cell(71, 7, 'CONDUCTOR: ' . $cho1, 1, 0, 'P');
    $pdf->Cell(70, 7, utf8_decode('LIC. MERCANCIAS PELIG. CNRT N°: ' . $cho2), 1, 0, 'P');
    $pdf->Cell(34, 7, 'VIGENCIA: ' . $cho3, 1, 0, 'P');



    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('3.INFORMACIÓN DE RESIDUOS'), 1, 1, 'P');


    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(45, 4, utf8_decode('CONTENEDORES'), 1, 0, 'C');
    $pdf->Cell(81, 9, utf8_decode('DESCRIPCIÓN'), 1, 0, 'C');
    $pdf->Cell(8, 9, utf8_decode('U.M.'), 1, 0, 'P');
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Cell(21, 9, utf8_decode('ESTADO FÍSICO'), 1, 0, 'P');
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(20, 9, utf8_decode('CORRIENTE'), 1, 0, 'P');

    $pdf->Ln(4);
    $pdf->Cell(10);
    $pdf->Cell(25, 5, utf8_decode('TIPO'), 1, 0, 'C');
    $pdf->Cell(20, 5, utf8_decode('CANTIDAD'), 1, 0, 'C');

    $pdf->Ln(5);
    $pdf->Cell(10);

    $pdf->SetFont('Arial', 'I', 8);

    $contador = 0;

    while ($fila = mysqli_fetch_array($consulta2)) {


        $pdf->Cell(25, 6, utf8_decode($fila['descr_ingreso']), 1, 0, 'P');
        $pdf->Cell(20, 6, utf8_decode($fila['cantidad']), 1, 0, 'R');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(81, 6, utf8_decode($fila['descripcion']), 1, 0, 'P');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(8, 6, utf8_decode($fila['um']), 1, 0, 'C');
        $pdf->Cell(21, 6, utf8_decode($fila['estado']), 1, 0, 'C');
        $pdf->Cell(20, 6, utf8_decode($fila['id_corrientes']), 1, 0, 'P');

        $contador = $contador + 1;

        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'I', 8);
    }


    if ($contador < 2) {
        $pdf->Cell(25, 6, '', 1, 0, 'P');
        $pdf->Cell(20, 6, '', 1, 0, 'R');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(81, 6, '', 1, 0, 'P');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(8, 6, '', 1, 0, 'C');
        $pdf->Cell(21, 6, '', 1, 0, 'C');
        $pdf->Cell(20, 6, '', 1, 0, 'P');

        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'I', 8);

        $pdf->Cell(25, 6, '', 1, 0, 'P');
        $pdf->Cell(20, 6, '', 1, 0, 'R');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(81, 6, '', 1, 0, 'P');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(8, 6, '', 1, 0, 'C');
        $pdf->Cell(21, 6, '', 1, 0, 'C');
        $pdf->Cell(20, 6, '', 1, 0, 'P');

        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'I', 8);

        $pdf->Cell(25, 6, '', 1, 0, 'P');
        $pdf->Cell(20, 6, '', 1, 0, 'R');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(81, 6, '', 1, 0, 'P');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(8, 6, '', 1, 0, 'C');
        $pdf->Cell(21, 6, '', 1, 0, 'C');
        $pdf->Cell(20, 6, '', 1, 0, 'P');

        $pdf->Ln(6);
        $pdf->Cell(10);
        $pdf->SetFont('Arial', 'I', 8);
    } else {

        if ($contador < 3) {
            $pdf->Cell(25, 6, '', 1, 0, 'P');
            $pdf->Cell(20, 6, '', 1, 0, 'R');
            $pdf->SetFont('Arial', 'I', 6);
            $pdf->Cell(81, 6, '', 1, 0, 'P');
            $pdf->SetFont('Arial', 'I', 8);
            $pdf->Cell(8, 6, '', 1, 0, 'C');
            $pdf->Cell(21, 6, '', 1, 0, 'C');
            $pdf->Cell(20, 6, '', 1, 0, 'P');

            $pdf->Ln(6);
            $pdf->Cell(10);
            $pdf->SetFont('Arial', 'I', 8);

            $pdf->Cell(25, 6, '', 1, 0, 'P');
            $pdf->Cell(20, 6, '', 1, 0, 'R');
            $pdf->SetFont('Arial', 'I', 6);
            $pdf->Cell(81, 6, '', 1, 0, 'P');
            $pdf->SetFont('Arial', 'I', 8);
            $pdf->Cell(8, 6, '', 1, 0, 'C');
            $pdf->Cell(21, 6, '', 1, 0, 'C');
            $pdf->Cell(20, 6, '', 1, 0, 'P');

            $pdf->Ln(6);
            $pdf->Cell(10);
            $pdf->SetFont('Arial', 'I', 8);
        } else {

            if ($contador < 4) {

                $pdf->Cell(25, 6, '', 1, 0, 'P');
                $pdf->Cell(20, 6, '', 1, 0, 'R');
                $pdf->SetFont('Arial', 'I', 6);
                $pdf->Cell(81, 6, '', 1, 0, 'P');
                $pdf->SetFont('Arial', 'I', 8);
                $pdf->Cell(8, 6, '', 1, 0, 'C');
                $pdf->Cell(21, 6, '', 1, 0, 'C');
                $pdf->Cell(20, 6, '', 1, 0, 'P');

                $pdf->Ln(6);
                $pdf->Cell(10);
                $pdf->SetFont('Arial', 'I', 8);
            }
        }
    }

    $pdf->Ln(0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('4.INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS'), 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(92, 6, utf8_decode('COMPONENTES Y CARACTERÍSTICAS PELIGROSAS - TOXICIDAD'), 1, 0, 'P');
    $pdf->Cell(83, 6, utf8_decode('SISTEMA DE IFENTIFICACIÓN DE PELIGROSIDAD'), 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(30, 6, utf8_decode('INHALACIÓN'), 1, 0, 'C');
    $pdf->Cell(30, 6, utf8_decode('DÉRMICA'), 1, 0, 'C');
    $pdf->Cell(32, 6, utf8_decode('ORAL'), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode('INFLAMABILIDAD: ' . $inflamabilidad), 1, 0, 'P');
    $pdf->Cell(43, 6, utf8_decode('REACTIVIDAD: ' . $reactividad), 1, 1, 'P');


    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(30, 6, $inhalacion, 1, 0, 'C');
    $pdf->Cell(30, 6, $dermica, 1, 0, 'C');
    $pdf->Cell(32, 6, $oral, 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode('TOXICIDAD: ' . $toxicidad), 1, 0, 'P');
    $pdf->Cell(43, 6, utf8_decode('INSTRUCC. ESPECIALES: ' . $inst_esp), 1, 1, 'P');



    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('5.INSTRUCTIVOS'), 1, 1, 'P');


    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 6);

    $pdf->Cell(111, 8, utf8_decode('MANIPULACIÓN PARA EL OP. EN LA PLANTA DE TRATAMIENTO O EN EL SITIO DE DISP. TRANSIT./FINAL'), 1, 0, 'P');
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 4, utf8_decode('SI (adjunta)'), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 8, $manipulacion, 1, 0, 'C');

    $pdf->Ln(4);
    $pdf->Cell(121);
    $pdf->Cell(32, 4, utf8_decode('NO (no adjunta)'), 1, 1, 'P');


    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(111, 8, utf8_decode('PLANES DE CONTINGENCIA'), 1, 0, 'P');
    $pdf->Cell(32, 4, utf8_decode('SI (adjunta)'), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 8, $planes, 1, 0, 'C');


    $pdf->Ln(4);
    $pdf->Cell(121);
    $pdf->Cell(32, 4, utf8_decode('NO (no adjunta)'), 1, 1, 'P');



    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(111, 8, utf8_decode('ROL DE EMERGENCIA - NÚMEROS DE CONTACTO'), 1, 0, 'P');
    $pdf->Cell(32, 4, utf8_decode('SI (adjunta)'), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 8, $rol, 1, 0, 'C');


    $pdf->Ln(4);
    $pdf->Cell(121);
    $pdf->Cell(32, 4, utf8_decode('NO (no adjunta)'), 1, 1, 'P');



    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);


    $pdf->Cell(111, 8, utf8_decode('HOJA DE RUTA'), 1, 0, 'P');
    $pdf->Cell(32, 4, utf8_decode('SI (adjunta)'), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 8, $hoja, 1, 0, 'C');

    $pdf->Ln(4);
    $pdf->Cell(121);
    $pdf->Cell(32, 4, utf8_decode('NO (no adjunta)'), 1, 1, 'P');



    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);


    $pdf->Cell(111, 8, utf8_decode('RUTAS ALTERNATIVAS'), 1, 0, 'P');
    $pdf->Cell(32, 4, utf8_decode('SI (adjunta)'), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(32, 8, $rutas, 1, 0, 'C');

    $pdf->Ln(4);
    $pdf->Cell(121);
    $pdf->Cell(32, 4, utf8_decode('NO (no adjunta)'), 1, 1, 'P');



    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('6.CERTIFICACIONES'), 1, 1, 'P');



    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(48, 4, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(44, 4, utf8_decode('FIRMA'), 1, 0, 'C');
    $pdf->Cell(40, 4, utf8_decode('TÍTULO/CARGO'), 1, 0, 'C');
    $pdf->Cell(43, 4, utf8_decode('FECHA'), 1, 1, 'C');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(48, 6, utf8_decode('GENERADOR'), 1, 0, 'P');
    $pdf->Cell(44, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(40, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(43, 6, utf8_decode(''), 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(48, 6, utf8_decode('TRANSPORTISTA'), 1, 0, 'P');
    $pdf->Cell(44, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(40, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(43, 6, utf8_decode(''), 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 8);

    $pdf->Cell(48, 6, utf8_decode('OPERADOR'), 1, 0, 'P');
    $pdf->Cell(44, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(40, 6, utf8_decode(''), 1, 0, 'P');
    $pdf->Cell(43, 6, utf8_decode(''), 1, 1, 'P');





    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('7.DELARACIÓN JURADA: CERTIFICACIÓN DEL GENERADOR'), 1, 1, 'P');


    $pdf->SetFont('Arial', 'I', 7.5);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('Declaro bajo juramento que la información y los datos manifestados
en la presente, son veraces y se ajustan a la legislación vigente de la materia'), 1, 1, 'P');

    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Cell(120, 5, utf8_decode('FECHA Y SITIO DE RECOLECCIÓN: ' . $fecha . ' | ' . $retiro_direc), 1, 0, 'P');

    $pdf->SetFont('Arial', 'I', 6);
    $pdf->Cell(55, 20, utf8_decode('FECHA ENTREGA AL OPERADOR PERMAN/TRANSIT:'), 1, 0, 'P');
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->Cell(120, 5, utf8_decode('FIRMA:'), 1, 0, 'P');


    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Cell(120, 5, utf8_decode('FECHA Y SITIO DE DESINFECCIÓN:'), 1, 0, 'P');
    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->Cell(120, 5, utf8_decode('FIRMA:'), 1, 1, 'P');

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10);
    $pdf->Cell(175, 5, utf8_decode('VÁLIDO ÚNICAMENTE PARA TRANSPORTE DENTRO DE LA PROVINCIA DEL CHUBUT'), 0, 1, 'P');

    $pdf->Output();
} else {
    return view('transportistas.reimprimirpdf');
}

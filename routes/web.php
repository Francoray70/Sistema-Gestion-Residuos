<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\nombresUsuarios;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\TransportistaController;
use App\Http\Controllers\CorrientesController;
use App\Http\Controllers\CorrientesgeneradorController;
use App\Http\Controllers\CorrientesodfController;
use App\Http\Controllers\CorrientesopalmController;
use App\Http\Controllers\CorrientestransporteController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\GeneradorController;
use App\Http\Controllers\OperadoralmController;
use App\Http\Controllers\OperadordfController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ManifiestoController;
use App\Http\Controllers\ManifiestodetController;
use App\Http\Controllers\LibromanifiestoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ImagenesmanifiestosController;
use App\Http\Controllers\HomeController;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*

---------------------------Rutas de inicio------------------------------

*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/inicio', [HomeController::class, 'index']);

Route::patch('/inicio', [HomeController::class, 'update']);

/*

---------------------------Rutas de generadores------------------------------

*/

Route::get('/generadores', function () {
    return view('generadores.index');
});

Route::get('/generadores', [GeneradorController::class, 'traerDatos']);

Route::post('/generadores', [GeneradorController::class, 'store']);

Route::get('/imagen/{id}', [GeneradorController::class, 'mostrarImagen'])->name('mostrarimagen');

Route::get('/corrientesgenerador', function () {
    return view('generadores.corrientes');
});

Route::get('/corrientesgenerador', [CorrientesgeneradorController::class, 'traerDatos']);

Route::post('/corrientesgenerador', [CorrientesgeneradorController::class, 'store']);

Route::get('/listacorrientesgeneradores', [CorrientesgeneradorController::class, 'index']);

Route::get('/listacantidades', [CorrientesgeneradorController::class, 'index']);

Route::get('/listacantidadesanuales', [CorrientesgeneradorController::class, 'traerDatosCantidades']);

Route::get('/cantidadesanuales', [CorrientesgeneradorController::class, 'resultadosCantidades'])->name('cantidadesanuales');

Route::get('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'show'])->name('editarcorrientegenerador');

Route::patch('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'update']);

Route::delete('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'destroy'])->name('eliminarcorrientegrdor');

Route::get('/direccionesgenerador', function () {
    return view('generadores.direcciones');
});

Route::get('/direccionesgenerador', [DireccionController::class, 'traerDatos']);

Route::post('/direccionesgenerador', [DireccionController::class, 'store']);

Route::get('/listadirecciones', [DireccionController::class, 'index']);

Route::get('/direccionesgenerador/{id}', [DireccionController::class, 'show'])->name('editardireccion');

Route::patch('/direccionesgenerador/{id}', [DireccionController::class, 'update']);

Route::get('/manifiestosgenerador', [LibromanifiestoController::class, 'traerDatos']);

Route::get('/librodegeneradores', [LibromanifiestoController::class, 'resultados'])->name('listamanifiestosgeneradores');

Route::get('/listagenerador', [GeneradorController::class, 'index']);

Route::get('/generadores/{id}', [GeneradorController::class, 'show'])->name('editargenerador');

Route::patch('/generadores/{id}', [GeneradorController::class, 'update']);

Route::get('/actualizargeneradorimg/{id}', [GeneradorController::class, 'showImg'])->name('actualizarimggen');

Route::patch('/actualizargeneradorimg/{id}', [GeneradorController::class, 'updateImg']);

Route::get('/imagenesgeneradorp/{id}', [ImagenController::class, 'imgProvincial'])->name('verprovincia');
Route::get('/imagenesgeneradorn/{id}', [ImagenController::class, 'imgNacional'])->name('vernacion');
Route::get('/imagenesgeneradorc/{id}', [ImagenController::class, 'imgComercial'])->name('vercomercial');
/*

---------------------------Rutas de transportistas------------------------------

*/

Route::get('/transportistas', function () {
    return view('transportistas.index');
});
Route::get('/transportistas', [TransportistaController::class, 'traerDatos']);

Route::post('/transportistas', [TransportistaController::class, 'store']);

Route::get('/listatransportes', [TransportistaController::class, 'index']);

Route::get('/transportistas/{id}', [TransportistaController::class, 'show'])->name('editartransporte');

Route::patch('/transportistas/{id}', [TransportistaController::class, 'update']);

Route::get('/corrientestransporte', function () {
    return view('transportistas.corrientes');
});

Route::get('/corrientestransporte', [CorrientestransporteController::class, 'traerDatos']);

Route::post('/corrientestransporte', [CorrientestransporteController::class, 'store']);

Route::get('/listacorrientestransportes', [CorrientestransporteController::class, 'index']);

Route::get('/corrientestransporte/{id}', [CorrientestransporteController::class, 'show'])->name('editarcorrientetransp');

Route::patch('/corrientestransporte/{id}', [CorrientestransporteController::class, 'update']);

Route::delete('/corrientestransporte/{id}', [CorrientestransporteController::class, 'destroy'])->name('eliminarcorrientetransporte');

Route::get('/choferes', function () {
    return view('transportistas.choferes');
});

Route::get('/choferes', [ChoferController::class, 'traerDatos']);

Route::post('/choferes', [ChoferController::class, 'store']);

Route::get('/listachoferes', [ChoferController::class, 'index']);

Route::get('/choferes/{id}', [ChoferController::class, 'show'])->name('editarchofer');

Route::patch('/choferes/{id}', [ChoferController::class, 'update']);

Route::get('/vehiculos', function () {
    return view('transportistas.vehiculos');
});

Route::get('/vehiculos', [VehiculosController::class, 'traerDatos']);

Route::post('/vehiculos', [VehiculosController::class, 'store']);

Route::get('/listavehiculos', [VehiculosController::class, 'index']);

Route::get('/vehiculos/{id}', [VehiculosController::class, 'show'])->name('editarvehiculo');

Route::patch('/vehiculos/{id}', [VehiculosController::class, 'update']);

Route::get('/generarmanifiesto', function () {
    return view('transportistas.generarmanif');
});

Route::get('/generarmanifiesto', [ManifiestoController::class, 'traerDatos']);

Route::post('/generarmanifiesto', [ManifiestoController::class, 'store']);

Route::get('/editarmanifiesto/{id}', [ManifiestoController::class, 'traerCabecerapEditar']);

Route::patch('/editarmanifiesto/{id}', [ManifiestoController::class, 'editarCabeceraManifiesto']);

Route::get('/listacabeceras', [ManifiestoController::class, 'index']);

Route::get('/reimprimirpdf', [ManifiestoController::class, 'paraImprimir']);

Route::get('/listadetalles', [ManifiestodetController::class, 'traerDetalles'])->name('listadetalles');

Route::get('/agregardetalle/{id}', [ManifiestodetController::class, 'sumarDetalle'])->name('sumardetalle');

Route::post('/agregardetalle', [ManifiestodetController::class, 'confirmarNewDetalle']);

Route::get('/imagenesmanifiestostr', function () {
    return view('transportistas.cargarimg');
});

Route::post('/imagenesmanifiestostr', [ImagenesmanifiestosController::class, 'store']);

Route::get('/imagenesmanifiestostr/{id}', [ImagenesmanifiestosController::class, 'imgManif'])->name('verimgmanif');

Route::get('/listaimgmanifiestos', [ImagenesmanifiestosController::class, 'index']);

Route::get('/buscarmanifiestos', function () {
    return view('transportistas.buscarmanif');
});

Route::get('/manifiestotransporteencontrado', [LibromanifiestoController::class, 'resultadosTransporteindividual'])->name('listamanifiestostransporteindividual');

Route::get('/libromanifiestos', [LibromanifiestoController::class, 'traerDatosTransporte']);

Route::get('/manifiestotransporte', [LibromanifiestoController::class, 'resultadosTransporte'])->name('listamanifiestostransporte');


Route::get('/actualizartransporteimg/{id}', [TransportistaController::class, 'showImg'])->name('actualizarimgtransp');

Route::patch('/actualizartransporteimg/{id}', [TransportistaController::class, 'updateImg']);

Route::get('/actualizarchoferimg/{id}', [ChoferController::class, 'showImg'])->name('actualizarimgchofer');

Route::patch('/actualizarchoferimg/{id}', [ChoferController::class, 'updateImg']);

Route::get('/actualizarvehiculoimg/{id}', [VehiculosController::class, 'showImg'])->name('actualizarimgvehi');

Route::patch('/actualizarvehiculoimg/{id}', [VehiculosController::class, 'updateImg']);

Route::get('/imagenestransportep/{id}', [ImagenController::class, 'imgProvincialT'])->name('verprovinciat');
Route::get('/imagenestransporten/{id}', [ImagenController::class, 'imgNacionalT'])->name('vernaciont');
Route::get('/imagenestransportem/{id}', [ImagenController::class, 'imgMunicipalT'])->name('vermunicipalt');


Route::get('/imageneschoferc/{id}', [ImagenController::class, 'imgcarnetCH'])->name('vercarnet');
Route::get('/imageneschofercp/{id}', [ImagenController::class, 'imgcargapeligrosaCH'])->name('vercp');
Route::get('/imageneschofers/{id}', [ImagenController::class, 'imgsepCH'])->name('versep');

Route::get('/imagenesvehr/{id}', [ImagenController::class, 'imgrutaVEH'])->name('veruta');
Route::get('/imagenesvehp/{id}', [ImagenController::class, 'imgpropiedadVEH'])->name('verprop');
Route::get('/imagenesvehc/{id}', [ImagenController::class, 'imgcedulaVEH'])->name('verced');
Route::get('/imagenesvehv/{id}', [ImagenController::class, 'imgvtvVEH'])->name('vervtv');
Route::get('/imagenesvehcp/{id}', [ImagenController::class, 'imgcargapeligrosaVEH'])->name('vercpveh');

/*

---------------------------Rutas de op almacenamiento------------------------------

*/

Route::get('/opalmacenamiento', function () {
    return view('opalmacenamiento.index');
});

Route::get('/opalmacenamiento', [OperadoralmController::class, 'traerDatos']);

Route::post('/opalmacenamiento', [OperadoralmController::class, 'store']);

Route::get('/listaopalm', [OperadoralmController::class, 'index']);

Route::get('/opalmacenamiento/{id}', [OperadoralmController::class, 'show'])->name('editaropalm');

Route::patch('/opalmacenamiento/{id}', [OperadoralmController::class, 'update']);

Route::get('/corrientesopalmacenamiento', function () {
    return view('opalmacenamiento.corrientes');
});

Route::get('/corrientesopalmacenamiento', [CorrientesopalmController::class, 'traerDatos']);

Route::post('/corrientesopalmacenamiento', [CorrientesopalmController::class, 'store']);

Route::get('/listacorrientesopalm', [CorrientesopalmController::class, 'index']);

Route::get('/listacantidadesanualesOpalm', [CorrientesopalmController::class, 'traerDatosCantidades']);

Route::get('/cantidadesanualesOpalm', [CorrientesopalmController::class, 'resultadosCantidades'])->name('cantidadesanualesOpalm');

Route::get('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'show'])->name('editarcorrienteopalm');

Route::patch('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'update']);

Route::delete('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'destroy'])->name('eliminarcorrienteopalm');

Route::get('/recibirmanifiestoalm', [CertificadoController::class, 'recibirManifiestos']);

Route::get('/autorizarmanifodf', [OperadoralmController::class, 'autorizarOrechazar'])->name('autorizarmanifodf');

Route::get('/enviarmanifiestoalm', [CertificadoController::class, 'traerDatospEnviar']);

Route::post('/enviarmanifiestoalm', [CertificadoController::class, 'traerDatospCertificar']);

Route::patch('/enviarmanifiestoalma', [CertificadoController::class, 'actualizarCertificadopDispFinal'])->name('actualizarCertificadopDispFinal');

Route::get('/generarcertifrpg', [CertificadoController::class, 'traerDatospgenerarCertif']);

Route::post('/generarcertifrpg', [CertificadoController::class, 'traerDatospgenerarCertificar']);

Route::get('/cargarimgrpg', function () {
    return view('opalmacenamiento.cargarimg');
});

Route::post('/cargarimgrpg', [ImagenesmanifiestosController::class, 'storeRpg']);

Route::get('/cargarimgrpg/{id}', [ImagenesmanifiestosController::class, 'imgRpga'])->name('verimgrpgoalm');

Route::get('/listaimgmanesrpg', [ImagenesmanifiestosController::class, 'indexrpg']);

Route::get('/libromanifiestosopalm', [LibromanifiestoController::class, 'traerDatosOpalm']);

Route::get('/manifiestopalm', [LibromanifiestoController::class, 'resultadosOpalm'])->name('listamanifiestosopalm');


Route::get('/librorpgalm', [LibromanifiestoController::class, 'traerDatosRpgAlm']);

Route::get('/rpgalm', [LibromanifiestoController::class, 'resultadosRpgAlm'])->name('listarpgalm');

Route::get('/actualizaropalmimg/{id}', [OperadoralmController::class, 'showImg'])->name('actualizarimgopalm');

Route::patch('/actualizaropalmimg/{id}', [OperadoralmController::class, 'updateImg']);


Route::get('/imagenesopalmp/{id}', [ImagenController::class, 'imgProvincialOALM'])->name('verprovinciaopalm');
Route::get('/imagenesopalmn/{id}', [ImagenController::class, 'imgNacionalOALM'])->name('vernacionopalm');
Route::get('/imagenesopalmm/{id}', [ImagenController::class, 'imgMunicipalOALM'])->name('vermunicipalopalm');

/*

---------------------------Rutas de opdispfinal------------------------------

*/

Route::get('/opdispfinal', function () {
    return view('opdispfinal.index');
});
Route::get('/opdispfinal', [OperadordfController::class, 'traerDatos']);

Route::post('/opdispfinal', [OperadordfController::class, 'store']);

Route::get('/listaodf', [OperadordfController::class, 'index']);

Route::get('/opdispfinal/{id}', [OperadordfController::class, 'show'])->name('editarodf');

Route::patch('/opdispfinal/{id}', [OperadordfController::class, 'update']);

Route::get('/corrientesopdispfinal', function () {
    return view('opdispfinal.corrientes');
});

Route::get('/corrientesopdispfinal', [CorrientesodfController::class, 'traerDatos']);

Route::post('/corrientesopdispfinal', [CorrientesodfController::class, 'store']);

Route::get('/listacorrientesodf', [CorrientesodfController::class, 'index']);

Route::get('/listacantidadesanualesOdf', [CorrientesodfController::class, 'traerDatosCantidades']);

Route::get('/cantidadesanualesOdf', [CorrientesodfController::class, 'resultadosCantidades'])->name('cantidadesanualesOdf');


Route::get('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'show'])->name('editarcorrienteodf');

Route::patch('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'update']);

Route::delete('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'destroy'])->name('eliminarcorrienteodf');

Route::get('/recibirmanifopdispfinal', [OperadordfController::class, 'traerDatosdeManifiestos']);

Route::get('/autorizarmanifodf', [OperadordfController::class, 'autorizarOrechazar'])->name('autorizarmanifodf');

Route::get('/generarcertdispfinal', [CertificadoController::class, 'traerDatospEnviar2']);

Route::get('/generarcertifdispfinal', [CertificadoController::class, 'traerDatosFinalpCertificar'])->name('generarelcertificado');

Route::get('/cargarimgcertif', function () {
    return view('opdispfinal.cargarimg');
});

Route::get('/libromanifiestosodf', [LibromanifiestoController::class, 'traerDatosOdf']);

Route::get('/manifiestodf', [LibromanifiestoController::class, 'resultadosOdf'])->name('listamanifiestosodf');

Route::get('/librocertificadoodf', [LibromanifiestoController::class, 'traerDatosCertifOdf']);

Route::get('/certificadodf', [LibromanifiestoController::class, 'resultadosCertifOdf'])->name('listacertificadosodf');

Route::get('/actualizarodfimg/{id}', [OperadordfController::class, 'showImg'])->name('actualizarimgodf');

Route::patch('/actualizarodfimg/{id}', [OperadordfController::class, 'updateImg']);

Route::get('/imagenesodfp/{id}', [ImagenController::class, 'imgProvincialODF'])->name('verprovinciaodf');
Route::get('/imagenesodfn/{id}', [ImagenController::class, 'imgNacionalODF'])->name('vernacionodf');
Route::get('/imagenesodfm/{id}', [ImagenController::class, 'imgMunicipalODF'])->name('vermunicipalodf');
/*

---------------------------Rutas de complementos------------------------------

*/

Route::get('/actividades', function () {
    return view('varios.actividades');
});

Route::post('/actividades', [ActividadesController::class, 'store']);

Route::get('/listaactividades', [ActividadesController::class, 'index']);

Route::get('/actividades/{id}', [ActividadesController::class, 'show'])->name('editaractividad');

Route::patch('/actividades/{id}', [ActividadesController::class, 'update']);

Route::get('/localidades', function () {
    return view('varios.localidades');
});

Route::get('/localidades', [LocalidadesController::class, 'traerDatos']);

Route::post('/localidades', [LocalidadesController::class, 'store']);

Route::get('/listalocalidades', [LocalidadesController::class, 'index']);

Route::get('/localidades/{id}', [LocalidadesController::class, 'show'])->name('editarlocalidad');

Route::patch('/localidades/{id}', [LocalidadesController::class, 'update']);

Route::get('/corrientesderesiduos', function () {
    return view('varios.corrientes');
});

Route::post('/corrientesderesiduos', [CorrientesController::class, 'store']);

Route::get('/listacorrientes', [CorrientesController::class, 'index']);

Route::get('/corrientesderesiduos/{id}', [CorrientesController::class, 'show'])->name('editarcorrienteprincipal');

Route::patch('/corrientesderesiduos/{id}', [CorrientesController::class, 'update']);

/*

---------------------------Rutas de usuarios------------------------------

*/

Route::get('/empresas', function () {
    return view('usuarios.empresas');
});

Route::get('/empresas', [EmpresasController::class, 'traerDatos']);

Route::post('/empresas', [EmpresasController::class, 'store']);

Route::get('/listaempresas', [EmpresasController::class, 'index']);

Route::get('/listausuarios', [nombresUsuarios::class, 'index']);

Route::get('/empresas/{id}', [EmpresasController::class, 'show'])->name('editarempresa');

Route::patch('/empresas/{id}', [EmpresasController::class, 'update']);

/*

---------------------------Rutas de conceptos globales------------------------------

*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*

---------------------------Rutas de descargas de excel------------------------------

*/

Route::get('/excelgenerador', [ExcelesController::class, 'excelGenerador']);


Route::get('/reimpresionpdf', [ManifiestoController::class, 'reimpresionpdf'])->name('reimpresiondelpdf');

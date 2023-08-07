<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\CertificadodetalleController;
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
use App\Http\Controllers\RegistroController;
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

Route::get('/inicio', [HomeController::class, 'index'])->middleware('auth');

Route::patch('/inicio', [HomeController::class, 'update'])->middleware('auth');

/*

---------------------------Rutas de generadores------------------------------

*/

Route::get('/generadores', function () {
    return view('generadores.index');
});

Route::get('/generadores', [GeneradorController::class, 'traerDatos'])->middleware('auth');

Route::post('/generadores', [GeneradorController::class, 'store'])->middleware('auth');

Route::get('/imagen/{id}', [GeneradorController::class, 'mostrarImagen'])->name('mostrarimagen')->middleware('auth');

Route::get('/corrientesgenerador', function () {
    return view('generadores.corrientes');
});

Route::get('/corrientesgenerador', [CorrientesgeneradorController::class, 'traerDatos'])->middleware('auth');

Route::post('/corrientesgenerador', [CorrientesgeneradorController::class, 'store'])->middleware('auth');

Route::get('/listacorrientesgeneradores', [CorrientesgeneradorController::class, 'index'])->middleware('auth');

Route::get('/listacantidades', [CorrientesgeneradorController::class, 'index'])->middleware('auth');

Route::get('/listacantidadesanuales', [CorrientesgeneradorController::class, 'traerDatosCantidades'])->middleware('auth');

Route::get('/cantidadesanuales', [CorrientesgeneradorController::class, 'resultadosCantidades'])->name('cantidadesanuales')->middleware('auth');

Route::get('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'show'])->name('editarcorrientegenerador')->middleware('auth');

Route::patch('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'update'])->middleware('auth');

Route::delete('/corrientesgenerador/{id}', [CorrientesgeneradorController::class, 'destroy'])->name('eliminarcorrientegrdor')->middleware('auth');

Route::get('/direccionesgenerador', function () {
    return view('generadores.direcciones');
});

Route::get('/direccionesgenerador', [DireccionController::class, 'traerDatos'])->middleware('auth');

Route::post('/direccionesgenerador', [DireccionController::class, 'store'])->middleware('auth');

Route::get('/listadirecciones', [DireccionController::class, 'index'])->middleware('auth');

Route::get('/direccionesgenerador/{id}', [DireccionController::class, 'show'])->name('editardireccion')->middleware('auth');

Route::patch('/direccionesgenerador/{id}', [DireccionController::class, 'update'])->middleware('auth');

Route::get('/manifiestosgenerador', [LibromanifiestoController::class, 'traerDatos'])->middleware('auth');

Route::get('/librodegeneradores', [LibromanifiestoController::class, 'resultados'])->name('listamanifiestosgeneradores')->middleware('auth');

Route::get('/listagenerador', [GeneradorController::class, 'index'])->middleware('auth');

Route::get('/generadores/{id}', [GeneradorController::class, 'show'])->name('editargenerador')->middleware('auth');

Route::patch('/generadores/{id}', [GeneradorController::class, 'update'])->middleware('auth');

Route::get('/actualizargeneradorimg/{id}', [GeneradorController::class, 'showImg'])->name('actualizarimggen')->middleware('auth');

Route::patch('/actualizargeneradorimg/{id}', [GeneradorController::class, 'updateImg'])->middleware('auth');

Route::get('/imagenesgeneradorp/{id}', [ImagenController::class, 'imgProvincial'])->name('verprovincia')->middleware('auth');
Route::get('/imagenesgeneradorn/{id}', [ImagenController::class, 'imgNacional'])->name('vernacion')->middleware('auth');
Route::get('/imagenesgeneradorc/{id}', [ImagenController::class, 'imgComercial'])->name('vercomercial')->middleware('auth');
/*

---------------------------Rutas de transportistas------------------------------

*/

Route::get('/transportistas', function () {
    return view('transportistas.index');
});

Route::get('/transportistas', [TransportistaController::class, 'traerDatos'])->middleware('auth');

Route::post('/transportistas', [TransportistaController::class, 'store'])->middleware('auth');

Route::get('/listatransportes', [TransportistaController::class, 'index'])->middleware('auth');

Route::get('/transportistas/{id}', [TransportistaController::class, 'show'])->name('editartransporte')->middleware('auth');

Route::patch('/transportistas/{id}', [TransportistaController::class, 'update'])->middleware('auth');

Route::get('/corrientestransporte', function () {
    return view('transportistas.corrientes');
});

Route::get('/corrientestransporte', [CorrientestransporteController::class, 'traerDatos'])->middleware('auth');

Route::post('/corrientestransporte', [CorrientestransporteController::class, 'store'])->middleware('auth');

Route::get('/listacorrientestransportes', [CorrientestransporteController::class, 'index'])->middleware('auth');

Route::get('/corrientestransporte/{id}', [CorrientestransporteController::class, 'show'])->name('editarcorrientetransp')->middleware('auth');

Route::patch('/corrientestransporte/{id}', [CorrientestransporteController::class, 'update'])->middleware('auth');

Route::delete('/corrientestransporte/{id}', [CorrientestransporteController::class, 'destroy'])->name('eliminarcorrientetransporte')->middleware('auth');

Route::get('/choferes', function () {
    return view('transportistas.choferes');
});

Route::get('/choferes', [ChoferController::class, 'traerDatos'])->middleware('auth');

Route::post('/choferes', [ChoferController::class, 'store'])->middleware('auth');

Route::get('/listachoferes', [ChoferController::class, 'index'])->middleware('auth');

Route::get('/choferes/{id}', [ChoferController::class, 'show'])->name('editarchofer')->middleware('auth');

Route::patch('/choferes/{id}', [ChoferController::class, 'update'])->middleware('auth');

Route::get('/vehiculos', function () {
    return view('transportistas.vehiculos');
});

Route::get('/vehiculos', [VehiculosController::class, 'traerDatos'])->middleware('auth');

Route::post('/vehiculos', [VehiculosController::class, 'store'])->middleware('auth');

Route::get('/listavehiculos', [VehiculosController::class, 'index'])->middleware('auth');

Route::get('/vehiculos/{id}', [VehiculosController::class, 'show'])->name('editarvehiculo')->middleware('auth');

Route::patch('/vehiculos/{id}', [VehiculosController::class, 'update'])->middleware('auth');

Route::get('/generarmanifiesto', function () {
    return view('transportistas.generarmanif');
});

Route::get('/generarmanifiesto', [ManifiestoController::class, 'traerDatos'])->middleware('auth');

Route::post('/generarmanifiesto', [ManifiestoController::class, 'store'])->middleware('auth');

Route::post('/generarmanifiestooffline', [ManifiestoController::class, 'storeOff'])->middleware('auth');

Route::get('/editarmanifiesto/{id}', [ManifiestoController::class, 'traerCabecerapEditar'])->name('editarcabecera')->middleware('auth');

Route::patch('/editarmanifiesto/{id}', [ManifiestoController::class, 'editarCabeceraManifiesto'])->middleware('auth');

Route::get('/editarmanifiestodetalle/{id}', [ManifiestodetController::class, 'traerDetallepEditar'])->name('editardetalle')->middleware('auth');

Route::patch('/editarmanifiestodetalle/{id}', [ManifiestodetController::class, 'editarDetalleManifiesto'])->middleware('auth');

Route::get('/listacabeceras', [ManifiestoController::class, 'index'])->middleware('auth');

Route::get('/reimprimirpdf', [ManifiestoController::class, 'paraImprimir'])->middleware('auth');

Route::get('/listadetalles', [ManifiestodetController::class, 'traerDetalles'])->name('listadetalles')->middleware('auth');

Route::get('/agregardetalle/{id}', [ManifiestodetController::class, 'sumarDetalle'])->name('sumardetalle')->middleware('auth');

Route::post('/agregardetalle', [ManifiestodetController::class, 'confirmarNewDetalle'])->middleware('auth');

Route::get('/imagenesmanifiestostr', function () {
    return view('transportistas.cargarimg');
});

Route::post('/imagenesmanifiestostr', [ImagenesmanifiestosController::class, 'store'])->middleware('auth');

Route::get('/imagenesmanifiestostr/{id}', [ImagenesmanifiestosController::class, 'imgManif'])->name('verimgmanif')->middleware('auth');

Route::get('/listaimgmanifiestos', [ImagenesmanifiestosController::class, 'index'])->middleware('auth');

Route::get('/buscarmanifiestos', function () {
    return view('transportistas.buscarmanif');
});

Route::get('/manifiestotransporteencontrado', [LibromanifiestoController::class, 'resultadosTransporteindividual'])->name('listamanifiestostransporteindividual')->middleware('auth');

Route::get('/libromanifiestos', [LibromanifiestoController::class, 'traerDatosTransporte'])->middleware('auth');

Route::get('/manifiestotransporte', [LibromanifiestoController::class, 'resultadosTransporte'])->name('listamanifiestostransporte')->middleware('auth');

Route::get('/actualizartransporteimg/{id}', [TransportistaController::class, 'showImg'])->name('actualizarimgtransp')->middleware('auth');

Route::patch('/actualizartransporteimg/{id}', [TransportistaController::class, 'updateImg'])->middleware('auth');

Route::get('/actualizarchoferimg/{id}', [ChoferController::class, 'showImg'])->name('actualizarimgchofer')->middleware('auth');

Route::patch('/actualizarchoferimg/{id}', [ChoferController::class, 'updateImg'])->middleware('auth');

Route::get('/actualizarvehiculoimg/{id}', [VehiculosController::class, 'showImg'])->name('actualizarimgvehi')->middleware('auth');

Route::patch('/actualizarvehiculoimg/{id}', [VehiculosController::class, 'updateImg'])->middleware('auth');

Route::get('/imagenestransportep/{id}', [ImagenController::class, 'imgProvincialT'])->name('verprovinciat')->middleware('auth');
Route::get('/imagenestransporten/{id}', [ImagenController::class, 'imgNacionalT'])->name('vernaciont')->middleware('auth');
Route::get('/imagenestransportem/{id}', [ImagenController::class, 'imgMunicipalT'])->name('vermunicipalt')->middleware('auth');


Route::get('/imageneschoferc/{id}', [ImagenController::class, 'imgcarnetCH'])->name('vercarnet')->middleware('auth');
Route::get('/imageneschofercp/{id}', [ImagenController::class, 'imgcargapeligrosaCH'])->name('vercp')->middleware('auth');
Route::get('/imageneschofers/{id}', [ImagenController::class, 'imgsepCH'])->name('versep')->middleware('auth');

Route::get('/imagenesvehr/{id}', [ImagenController::class, 'imgrutaVEH'])->name('veruta')->middleware('auth');
Route::get('/imagenesvehp/{id}', [ImagenController::class, 'imgpropiedadVEH'])->name('verprop')->middleware('auth');
Route::get('/imagenesvehc/{id}', [ImagenController::class, 'imgcedulaVEH'])->name('verced')->middleware('auth');
Route::get('/imagenesvehv/{id}', [ImagenController::class, 'imgvtvVEH'])->name('vervtv')->middleware('auth');
Route::get('/imagenesvehcp/{id}', [ImagenController::class, 'imgcargapeligrosaVEH'])->name('vercpveh')->middleware('auth');

/*

---------------------------Rutas de op almacenamiento------------------------------

*/

Route::get('/opalmacenamiento', function () {
    return view('opalmacenamiento.index');
});

Route::get('/opalmacenamiento', [OperadoralmController::class, 'traerDatos'])->middleware('auth');

Route::post('/opalmacenamiento', [OperadoralmController::class, 'store'])->middleware('auth');

Route::get('/listaopalm', [OperadoralmController::class, 'index'])->middleware('auth');

Route::get('/opalmacenamiento/{id}', [OperadoralmController::class, 'show'])->name('editaropalm')->middleware('auth');

Route::patch('/opalmacenamiento/{id}', [OperadoralmController::class, 'update'])->middleware('auth');

Route::get('/corrientesopalmacenamiento', function () {
    return view('opalmacenamiento.corrientes');
});

Route::get('/corrientesopalmacenamiento', [CorrientesopalmController::class, 'traerDatos'])->middleware('auth');

Route::post('/corrientesopalmacenamiento', [CorrientesopalmController::class, 'store'])->middleware('auth');

Route::get('/listacorrientesopalm', [CorrientesopalmController::class, 'index'])->middleware('auth');

Route::get('/listacantidadesanualesOpalm', [CorrientesopalmController::class, 'traerDatosCantidades'])->middleware('auth');

Route::get('/cantidadesanualesOpalm', [CorrientesopalmController::class, 'resultadosCantidades'])->name('cantidadesanualesOpalm')->middleware('auth');

Route::get('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'show'])->name('editarcorrienteopalm')->middleware('auth');

Route::patch('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'update'])->middleware('auth');

Route::delete('/corrientesopalmacenamiento/{id}', [CorrientesopalmController::class, 'destroy'])->name('eliminarcorrienteopalm')->middleware('auth');

Route::get('/recibirmanifiestoalm', [CertificadoController::class, 'recibirManifiestos'])->middleware('auth');

Route::get('/autorizarmanifodf', [OperadoralmController::class, 'autorizarOrechazar'])->name('autorizarmanifodf')->middleware('auth');

Route::get('/enviarmanifiestoalm', [CertificadoController::class, 'traerDatospEnviar'])->middleware('auth');

Route::post('/enviarmanifiestoalm', [CertificadoController::class, 'traerDatospCertificar'])->middleware('auth');

Route::patch('/enviarmanifiestoalma', [CertificadoController::class, 'actualizarCertificadopDispFinal'])->name('actualizarCertificadopDispFinal')->middleware('auth');

Route::get('/generarcertifrpg', [CertificadoController::class, 'traerDatospgenerarCertif'])->middleware('auth');

Route::post('/generarcertifrpg', [CertificadoController::class, 'traerDatospgenerarCertificar'])->middleware('auth');

Route::patch('/cargarpg', [CertificadoController::class, 'cargarRpg'])->middleware('auth');

Route::get('/cargarimgrpg', function () {
    return view('opalmacenamiento.cargarimg');
});

Route::post('/cargarimgrpg', [ImagenesmanifiestosController::class, 'storeRpg'])->middleware('auth');

Route::get('/cargarimgrpg/{id}', [ImagenesmanifiestosController::class, 'imgRpga'])->name('verimgrpgoalm')->middleware('auth');

Route::get('/listaimgmanesrpg', [ImagenesmanifiestosController::class, 'indexrpg'])->middleware('auth');

Route::get('/libromanifiestosopalm', [LibromanifiestoController::class, 'traerDatosOpalm'])->middleware('auth');

Route::get('/manifiestopalm', [LibromanifiestoController::class, 'resultadosOpalm'])->name('listamanifiestosopalm')->middleware('auth');

Route::get('/librorpgalm', [LibromanifiestoController::class, 'traerDatosRpgAlm'])->middleware('auth');

Route::get('/rpgalm', [LibromanifiestoController::class, 'resultadosRpgAlm'])->name('listarpgalm')->middleware('auth');

Route::get('/actualizaropalmimg/{id}', [OperadoralmController::class, 'showImg'])->name('actualizarimgopalm')->middleware('auth');

Route::patch('/actualizaropalmimg/{id}', [OperadoralmController::class, 'updateImg'])->middleware('auth');


Route::get('/imagenesopalmp/{id}', [ImagenController::class, 'imgProvincialOALM'])->name('verprovinciaopalm')->middleware('auth');
Route::get('/imagenesopalmn/{id}', [ImagenController::class, 'imgNacionalOALM'])->name('vernacionopalm')->middleware('auth');
Route::get('/imagenesopalmm/{id}', [ImagenController::class, 'imgMunicipalOALM'])->name('vermunicipalopalm')->middleware('auth');

/*

---------------------------Rutas de opdispfinal------------------------------

*/

Route::get('/opdispfinal', function () {
    return view('opdispfinal.index');
});
Route::get('/opdispfinal', [OperadordfController::class, 'traerDatos'])->middleware('auth');

Route::post('/opdispfinal', [OperadordfController::class, 'store'])->middleware('auth');

Route::get('/listaodf', [OperadordfController::class, 'index'])->middleware('auth');

Route::get('/opdispfinal/{id}', [OperadordfController::class, 'show'])->name('editarodf')->middleware('auth');

Route::patch('/opdispfinal/{id}', [OperadordfController::class, 'update'])->middleware('auth');

Route::get('/corrientesopdispfinal', function () {
    return view('opdispfinal.corrientes');
});

Route::get('/corrientesopdispfinal', [CorrientesodfController::class, 'traerDatos'])->middleware('auth');

Route::post('/corrientesopdispfinal', [CorrientesodfController::class, 'store'])->middleware('auth');

Route::get('/listacorrientesodf', [CorrientesodfController::class, 'index'])->middleware('auth');

Route::get('/listacantidadesanualesOdf', [CorrientesodfController::class, 'traerDatosCantidades'])->middleware('auth');

Route::get('/cantidadesanualesOdf', [CorrientesodfController::class, 'resultadosCantidades'])->name('cantidadesanualesOdf')->middleware('auth');


Route::get('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'show'])->name('editarcorrienteodf')->middleware('auth');

Route::patch('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'update'])->middleware('auth');

Route::delete('/corrientesopdispfinal/{id}', [CorrientesodfController::class, 'destroy'])->name('eliminarcorrienteodf')->middleware('auth');

Route::get('/recibirmanifopdispfinal', [OperadordfController::class, 'traerDatosdeManifiestos'])->middleware('auth');

Route::get('/autorizarmanifodf', [OperadordfController::class, 'autorizarOrechazar'])->name('autorizarmanifodf')->middleware('auth');

Route::get('/generarcertdispfinal', [CertificadoController::class, 'traerDatospEnviar2'])->middleware('auth');

Route::post('/generarcertifdispfinal', [CertificadoController::class, 'traerDatosFinalpCertificar'])->middleware('auth');

Route::post('/generarcertifdispfinaloff', [CertificadoController::class, 'traerDatosFinalpCertificarOff'])->middleware('auth');

Route::post('/cargarcertificadodispfinal', [CertificadoController::class, 'cargarCertificadoDF'])->middleware('auth');

Route::patch('/cargarcertificadodispfinal', [CertificadoController::class, 'cargarCertificadoDF'])->middleware('auth');

Route::get('/cargarimgcertif', function () {
    return view('opdispfinal.cargarimg');
});

Route::get('/listaCertificadoCabecera', [CertificadoController::class, 'traerCertificadosCabecera'])->middleware('auth');

Route::get('/listaCertificadoDetalle', [CertificadodetalleController::class, 'traerCertificadosDetalles'])->name('listaCertificadoDetalle')->middleware('auth');

Route::get('/libromanifiestosodf', [LibromanifiestoController::class, 'traerDatosOdf'])->middleware('auth');

Route::get('/manifiestodf', [LibromanifiestoController::class, 'resultadosOdf'])->name('listamanifiestosodf')->middleware('auth');

Route::get('/librocertificadoodf', [LibromanifiestoController::class, 'traerDatosCertifOdf'])->middleware('auth');

Route::get('/certificadodf', [LibromanifiestoController::class, 'resultadosCertifOdf'])->name('listacertificadosodf')->middleware('auth');

Route::get('/actualizarodfimg/{id}', [OperadordfController::class, 'showImg'])->name('actualizarimgodf')->middleware('auth');

Route::patch('/actualizarodfimg/{id}', [OperadordfController::class, 'updateImg']);

Route::get('/imagenesodfp/{id}', [ImagenController::class, 'imgProvincialODF'])->name('verprovinciaodf')->middleware('auth');
Route::get('/imagenesodfn/{id}', [ImagenController::class, 'imgNacionalODF'])->name('vernacionodf')->middleware('auth');
Route::get('/imagenesodfm/{id}', [ImagenController::class, 'imgMunicipalODF'])->name('vermunicipalodf')->middleware('auth');
/*

---------------------------Rutas de complementos------------------------------

*/

Route::get('/actividades', function () {
    return view('varios.actividades');
});

Route::post('/actividades', [ActividadesController::class, 'store'])->middleware('auth');

Route::get('/listaactividades', [ActividadesController::class, 'index'])->middleware('auth');

Route::get('/actividades/{id}', [ActividadesController::class, 'show'])->name('editaractividad')->middleware('auth');

Route::patch('/actividades/{id}', [ActividadesController::class, 'update'])->middleware('auth');

Route::get('/localidades', function () {
    return view('varios.localidades');
});

Route::get('/localidades', [LocalidadesController::class, 'traerDatos'])->middleware('auth');

Route::post('/localidades', [LocalidadesController::class, 'store'])->middleware('auth');

Route::get('/listalocalidades', [LocalidadesController::class, 'index'])->middleware('auth');

Route::get('/localidades/{id}', [LocalidadesController::class, 'show'])->name('editarlocalidad')->middleware('auth');

Route::patch('/localidades/{id}', [LocalidadesController::class, 'update'])->middleware('auth');

Route::get('/corrientesderesiduos', function () {
    return view('varios.corrientes');
});

Route::post('/corrientesderesiduos', [CorrientesController::class, 'store'])->middleware('auth');

Route::get('/listacorrientes', [CorrientesController::class, 'index'])->middleware('auth');

Route::get('/corrientesderesiduos/{id}', [CorrientesController::class, 'show'])->name('editarcorrienteprincipal')->middleware('auth');

Route::patch('/corrientesderesiduos/{id}', [CorrientesController::class, 'update'])->middleware('auth');

/*

---------------------------Rutas de usuarios------------------------------

*/

Route::get('/empresas', function () {
    return view('usuarios.empresas');
});

Route::get('/empresas', [EmpresasController::class, 'traerDatos'])->middleware('auth');

Route::post('/empresas', [EmpresasController::class, 'store'])->middleware('auth');

Route::get('/listaempresas', [EmpresasController::class, 'index'])->middleware('auth');

Route::get('/listausuarios', [nombresUsuarios::class, 'index'])->middleware('auth');

Route::get('/empresas/{id}', [EmpresasController::class, 'show'])->name('editarempresa')->middleware('auth');

Route::patch('/empresas/{id}', [EmpresasController::class, 'update'])->middleware('auth');

Route::get('/usuarios/{id}', [nombresUsuarios::class, 'show'])->name('editarusuario')->middleware('auth');

Route::patch('/usuarios/{id}', [nombresUsuarios::class, 'update'])->middleware('auth');

/*

---------------------------Rutas de conceptos globales------------------------------

*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/registro', [RegistroController::class, 'CrearUsuario'])->middleware('auth');
/*

---------------------------Rutas de descargas de excel------------------------------

*/

Route::get('/excelgenerador', [ExcelesController::class, 'excelGenerador'])->middleware('auth');


Route::get('/reimpresionpdf', [ManifiestoController::class, 'reimpresionpdf'])->name('reimpresiondelpdf')->middleware('auth');

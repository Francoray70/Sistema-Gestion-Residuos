<?php

use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\nombresUsuarios;
use App\Http\Controllers\generador;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\TransportistaController;
use App\Http\Controllers\ControllerBusiness;
use App\Http\Controllers\CorrientesController;
use App\Http\Controllers\GeneradorController;

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

Route::get('/', function () {
    return view('index');
});

/*

---------------------------Rutas de generadores------------------------------

*/

Route::get('/generadores', function () {
    return view('generadores.index');
});

Route::get('/corrientesgenerador', function () {
    return view('generadores.corrientes');
});

Route::get('/direccionesgenerador', function () {
    return view('generadores.direcciones');
});

Route::get('/manifiestosgenerador', function () {
    return view('generadores.manifiestos');
});

Route::get('/listagenerador', [GeneradorController::class, 'index']);


/*

---------------------------Rutas de transportistas------------------------------

*/

Route::get('/transportistas', function () {
    return view('transportistas.index');
});

Route::get('/transportistas', [ControllerBusiness::class, 'index']);
Route::post('/transportistas', [TransportistaController::class, 'store']);
Route::get('/listatransportes', [TransportistaController::class, 'index']);

Route::get('/corrientestransporte', function () {
    return view('transportistas.corrientes');
});

Route::get('/choferes', function () {
    return view('transportistas.choferes');
});

Route::get('/vehiculos', function () {
    return view('transportistas.vehiculos');
});

Route::get('/generarmanifiesto', function () {
    return view('transportistas.generarmanif');
});

Route::get('/imagenesmanifiestostr', function () {
    return view('transportistas.cargarimg');
});

Route::get('/buscarmanifiestos', function () {
    return view('transportistas.buscarmanif');
});

Route::get('/libromanifiestos', function () {
    return view('transportistas.libro');
});

/*

---------------------------Rutas de op almacenamiento------------------------------

*/

Route::get('/opalmacenamiento', function () {
    return view('opalmacenamiento.index');
});

Route::get('/corrientesopalmacenamiento', function () {
    return view('opalmacenamiento.corrientes');
});

Route::get('/recibirmanifiestoalm', function () {
    return view('opalmacenamiento.recibir');
});

Route::get('/enviarmanifiestoalm', function () {
    return view('opalmacenamiento.enviar');
});

Route::get('/generarcertifrpg', function () {
    return view('opalmacenamiento.generarcert');
});

Route::get('/cargarimgrpg', function () {
    return view('opalmacenamiento.cargarimg');
});

Route::get('/manifiestosalm', function () {
    return view('opalmacenamiento.libromanif');
});

Route::get('/listarpg', function () {
    return view('opalmacenamiento.listarpg');
});

/*

---------------------------Rutas de opdispfinal------------------------------

*/

Route::get('/opdispfinal', function () {
    return view('opdispfinal.index');
});

Route::get('/corrientesopdispfinal', function () {
    return view('opdispfinal.corrientes');
});

Route::get('/recibirmanifopdispfinal', function () {
    return view('opdispfinal.recibir');
});

Route::get('/generarcertdispfinal', function () {
    return view('opdispfinal.generar');
});

Route::get('/cargarimgcertif', function () {
    return view('opdispfinal.cargarimg');
});

Route::get('/librocertificadosopdispfinal', function () {
    return view('opdispfinal.librocertif');
});

Route::get('/libromanifiestosopdispfinal', function () {
    return view('opdispfinal.libromanif');
});

/*

---------------------------Rutas de complementos------------------------------

*/

Route::get('/actividades', function () {
    return view('varios.actividades');
});
Route::get('/listaactividades', [ActividadesController::class, 'index']);

Route::get('/localidades', function () {
    return view('varios.localidades');
});

Route::get('/listalocalidades', [LocalidadesController::class, 'index']);

Route::get('/corrientesderesiduos', function () {
    return view('varios.corrientes');
});

Route::get('/listacorrientes', [CorrientesController::class, 'index']);
/*

---------------------------Rutas de usuarios------------------------------

*/

Route::get('/empresas', function () {
    return view('usuarios.empresas');
});

Route::post('/empresas', [EmpresasController::class, 'store']);

Route::get('/empresas', [ProvinciasController::class, 'index']);

Route::get('/listaempresas', [EmpresasController::class, 'index']);

Route::get('/listausuarios', [nombresUsuarios::class, 'index']);

Route::get('/empresas/{id}', [EmpresasController::class, 'show'])->name('editarempresa');
Route::patch('/empresas/{id}', [EmpresasController::class, 'update']);

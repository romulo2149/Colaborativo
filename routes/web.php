<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});


Route::get('/inicio', 'HomeController@inicio')->name('inicio');

Auth::routes();

Route::get('/home', 'ProyectoController@index')->name('home');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

Auth::routes();

//Rutas del Perfil
Route::get('/perfil', 'PerfilController@perfil')->name('perfil');
Route::get('/verPerfil', 'PerfilController@verperfil')->name('verPerfil');
Route::post('/perfil/guardarImagen', 'PerfilController@guardarImagen')->name('guardarImagen');
Route::post('/perfil/cambiarNombre', 'PerfilController@cambiarNombre')->name('cambiarNombre');
Route::post('/perfil/informacionAcademica', 'PerfilController@informacionAcademica')->name('informacionAcademica');
Route::post('/perfil/informacionAcademica/{idInformacionAcademica}/delete', 'PerfilController@deleteInformacionAcademica')->name('deleteInformacionAcademica');
Route::post('/perfil/informacionAcademica/editInformacionAcademica', 'PerfilController@editInformacionAcademica')->name('editInformacionAcademica');
Route::post('/perfil/informacionLaboral', 'PerfilController@informacionLaboral')->name('informacionLaboral');
Route::post('/perfil/informacionLaboral/{idInformacionLaboral}/delete', 'PerfilController@deleteInformacionLaboral')->name('deleteInformacionLaboral');
Route::post('/perfil/informacionLaboral/editInformacionLaboral', 'PerfilController@editInformacionLaboral')->name('editInformacionLaboral');
Route::post('/perfil/saveSalary', 'PerfilController@saveSalary')->name('saveSalary');
Route::post('/perfil/savePhone', 'PerfilController@savePhone')->name('savePhone');
Route::post('/perfil/nuevaTarjeta', 'PerfilController@nuevaTarjeta')->name('nuevaTarjeta');
Route::post('/perfil/nuevaTrans', 'PerfilController@nuevaTransferencia')->name('nuevaTrans');
Route::post('/perfil/nuevaCartera', 'PerfilController@nuevaEwallet')->name('nuevaCartera');

//Rutas proyecto
Route::get('/proyecto', 'ProyectoController@cargarvista')->name('vistaproyecto');
Route::get('/misproyectos', 'ProyectoController@showmyprojects')->name('showMyProject');
Route::post('/home', 'ProyectoController@subir')->name('subirproyecto');
Route::get('buscarProyecto', 'ProyectoController@SearchProject')->name('buscarProyecto');
Route::post('buscar', 'ProyectoController@ShowProject')->name('mostrarProyecto');
Route::get('/detallesproyectofreelancer', 'ProyectoController@projectdetailsfreelancer')->name('detallesproyectofreelancer');
Route::post('/descargarArchivo', 'ProyectoController@download')->name('descargarArchivo');
Route::post('/enviarsolicitud', 'SolicitudController@subir')->name('enviarsolicitud');
Route::delete('/eliminarsolicitud', 'SolicitudController@eliminar')->name('eliminarsolicitud');
Route::post('/crearContrato', 'SolicitudController@crearContrato')->name('crearContrato');
Route::post('/subirContrato', 'SolicitudController@subirContrato')->name('subirContrato');
Route::get('/firmarFreelancer', 'SolicitudController@firmar')->name('firmar');
Route::put('/tratoContrato', 'SolicitudController@trato')->name('tratoContrato');
Route::get('/verContrato', 'SolicitudController@firmar')->name('verContrato');
Route::get('/workspace', 'ProyectoController@work')->name('workspace');
Route::post('/estatusProgreso', 'ProyectoController@progreso')->name('estatusProgreso');
Route::post('/liberar', 'ProyectoController@liberar')->name('liberar');
Route::get('/chat', 'NotificacionesController@chat')->name('chat');
Route::post('/nuevoContacto', 'ContactsController@nuevo')->name('nuevoContacto');

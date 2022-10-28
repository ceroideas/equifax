<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClaimsController;
use App\Http\Controllers\ThirdPartiesController;
use App\Http\Controllers\DebtorsController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\ConfigurationsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ActuationsController;

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
    return view('welcome');
});

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('/testimonios', function () {
    return view('testimonios');
});

Route::get('/preguntas', function () {
    return view('preguntas');
});

Route::get('/tarifas', function () {
    return view('tarifas');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Auth::routes();

Route::post('registerSocial', [RegisterController::class, 'registerSocial']);

/* Usuarios */

Route::group(['prefix' => 'users'], function(){
    Route::get('/', [UsersController::class, 'index']);
    Route::get('/pending', [UsersController::class, 'pending']);
    Route::get('/create', [UsersController::class, 'create'])->name('user.create');
    Route::get('/{user}', [UsersController::class, 'show'])->name('user.show');
    Route::post('', [UsersController::class, 'store']);
    Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UsersController::class, 'update']);
    Route::delete('/{user}', [UsersController::class, 'destroy']);
    Route::post('/approval/{user}', [UsersController::class, 'approval']);
    Route::post('/denial/{user}', [UsersController::class, 'denial']);

});

Route::get('change-password', function(){
    return view('users.change-password');
});
Route::post('change-password', [UsersController::class, 'changePassword']);

/* Reclamaciones */

Route::group(['prefix' => 'claims'], function(){
    Route::get('/', [ClaimsController::class, 'index']);
    Route::get('/invalid-debtor', [ClaimsController::class, 'invalidDebtor']);
    Route::get('/create', [ClaimsController::class, 'create']);
    Route::get('/select-client', [ClaimsController::class, 'stepOne']);
    Route::get('/select-debtor', [ClaimsController::class, 'stepTwo']);
    Route::get('/create-debt', [ClaimsController::class, 'stepThree']);
    Route::get('/check-debtor', [ClaimsController::class, 'stepFour']);
    Route::get('/check-agreement', [ClaimsController::class, 'stepFive']);
    Route::get('/accept-terms', [ClaimsController::class, 'stepSix']);
    Route::get('/save-option-one', [ClaimsController::class, 'saveOptionOne']);
    // Route::post('/save-client', [ClaimsController::class, 'saveClient']);
    Route::get('/save-option-two/{id}', [ClaimsController::class, 'saveOptionTwo']);
    Route::get('/save-debtor/{id}', [ClaimsController::class, 'saveDebtor']);
    Route::get('/clear-option-one', [ClaimsController::class, 'flushOptionOne']);
    Route::get('/clear-option-two', [ClaimsController::class, 'flushOptionTwo']);
    Route::get('/refuse-agreement', [ClaimsController::class, 'refuseAgreement']);
    Route::get('/invoices', [ClaimsController::class , 'myInvoices']);
    Route::get('/invoices/{id}', [ClaimsController::class , 'myInvoice']);
    Route::get('/orders', [ClaimsController::class , 'myOrders']);
    Route::get('/orders/{id}', [ClaimsController::class , 'myOrder']);
    Route::get('/facturar', [ClaimsController::class , 'facturar']);
    Route::get('/gestoria', [ClaimsController::class , 'byGestoria']);
    Route::get('/gestoria/{id}', [ClaimsController::class , 'byGestoriaDetail']);
    Route::get('/actuations/{id}', [ClaimsController::class , 'actuations']);
    Route::post('/actuations/{id}', [ClaimsController::class , 'saveActuation']);
    Route::get('/flush-options', [ClaimsController::class, 'flushAll']);
    Route::post('/', [ClaimsController::class, 'store']);
    Route::get('/pending', [ClaimsController::class, 'pending']);
    Route::get('/{claim}', [ClaimsController::class, 'show']);
    Route::get('payment/{claim}', [ClaimsController::class, 'payment']);
    Route::get('{claim}/viable/{id?}', [ClaimsController::class , 'viable']);
    Route::get('{claim}/non-viable/{id?}', [ClaimsController::class , 'nonViable']);
    Route::get('/close/{claim}', [ClaimsController::class , 'close']);
    Route::post('/non-viable/{claim}/save', [ClaimsController::class, 'setNonViable']);
    Route::post('/viable/{claim}/save', [ClaimsController::class, 'setViable']);

    Route::post('payment', [PaymentsController::class, 'payment']);
    Route::post('payToken', [PaymentsController::class, 'payToken']);
    /**/
    Route::post('check_debtor', [ClaimsController::class, 'checkDebtor']);
    /**/


});

Route::get('viability', [ClaimsController::class, 'viability']);

Route::post('uploadApudActa', [ClaimsController::class, 'uploadApudActa']);

Route::get('export-all', [ClaimsController::class, 'exportAll']);
Route::get('export-new-claims', [ClaimsController::class, 'exportNewClaims']);
Route::get('export-finished', [ClaimsController::class, 'exportFinished']);
Route::get('export-users', [UsersController::class, 'exportUsers']);

Route::get('export-actuations-all', [ActuationsController::class, 'exportActuationsAll']);
Route::get('export-new-actuations', [ActuationsController::class, 'exportNewActuations']);

/* Terceros */
Route::group(['prefix' => 'third-parties'], function(){

    Route::get('/', [ThirdPartiesController::class, 'index']);
    Route::get('/create', [ThirdPartiesController::class, 'create']);
    Route::post('/', [ThirdPartiesController::class, 'store']);
    Route::get('/{thirdParty}', [ThirdPartiesController::class, 'show']);
    Route::get('/{thirdParty}/edit', [ThirdPartiesController::class, 'edit']);
    Route::put('/{thirdParty}', [ThirdPartiesController::class, 'update']);
    Route::delete('/{thirdParty}', [ThirdPartiesController::class, 'destroy']);



});

/* Deudores */
Route::group(['prefix' => 'debtors'], function(){

    Route::get('/', [DebtorsController::class, 'index']);
    Route::get('/create', [DebtorsController::class, 'create']);
    Route::post('/', [DebtorsController::class, 'store']);
    Route::get('/{debtor}', [DebtorsController::class, 'show']);
    Route::get('/{debtor}/edit', [DebtorsController::class, 'edit']);
    Route::put('/{debtor}', [DebtorsController::class, 'update']);
    Route::delete('/{debtor}', [DebtorsController::class, 'destroy']);



});

/* Deudas */

Route::group(['prefix' => 'debts'], function(){

    // Route::get('/', [DebtorsController::class, 'index']);
    Route::get('/create/step-one', [DebtsController::class, 'stepOne']);
    Route::get('/create/step-two', [DebtsController::class, 'stepTwo']);
    Route::get('/create/step-three', [DebtsController::class, 'stepThree']);
    Route::post('/step-one/save', [DebtsController::class, 'saveStepOne']);
    Route::post('/step-two/save', [DebtsController::class, 'saveStepTwo']);
    Route::post('/step-three/save', [DebtsController::class, 'saveStepThree']);
    // Route::post('/', [DebtorsController::class, 'store']);
    // Route::get('/{debtor}', [DebtorsController::class, 'show']);
    // Route::get('/{debtor}/edit', [DebtorsController::class, 'edit']);
    // Route::put('/{debtor}', [DebtorsController::class, 'update']);
    // Route::delete('/{debtor}', [DebtorsController::class, 'destroy']);



});

/* Acuerdos */
Route::group(['prefix' => 'agreements'], function(){

    Route::get('/create', [AgreementsController::class, 'create']);
    Route::post('/save-agreement', [AgreementsController::class, 'saveAgreement']);
});

/* Configuraciones */

Route::group(['prefix'  => 'configurations'], function(){

    Route::get('/fees', [ConfigurationsController::class, 'fees']);
    Route::post('/fees', [ConfigurationsController::class, 'feesStore']);
    Route::put('{configuration}/fees', [ConfigurationsController::class, 'feesUpdate']);
    //
    Route::get('/hitos', [ConfigurationsController::class, 'hitos']);
    Route::get('/hitos/create', [ConfigurationsController::class, 'createHitos']);
    Route::get('/hitos/{id}/edit', [ConfigurationsController::class, 'createHitos']);

    Route::post('/hitos/save', [ConfigurationsController::class, 'saveHitos']);
    Route::post('/hitos/{id}/update', [ConfigurationsController::class, 'updateHitos']);

    Route::get('/templates', [ConfigurationsController::class, 'templates']);
    Route::get('/templates/create', [ConfigurationsController::class, 'createTemplate']);
    Route::get('/templates/{id}/edit', [ConfigurationsController::class, 'createTemplate']);

    Route::post('/templates/save', [ConfigurationsController::class, 'saveTemplate']);
    Route::post('/templates/{id}/update', [ConfigurationsController::class, 'updateTemplate']);


});
Route::delete('/template/{id}', [ConfigurationsController::class, 'deleteTemplates']);
Route::delete('/hitos/{id}', [ConfigurationsController::class, 'deleteHitos']);

/**/
Route::get('excel-invoice/{id}', [ClaimsController::class, 'excelInvoice']);
Route::get('invoices-export', [ClaimsController::class, 'invoicesExport']);
Route::get('orders-export', [ClaimsController::class, 'ordersExport']);

Route::get('migrar', [UsersController::class, 'migrar']);

Route::get('exportTemplate/{id}', [WordController::class, 'exportTemplate']);

Route::post('importParty', [WordController::class, 'importParty']);
Route::post('importPostalCode', [WordController::class, 'importPostalCode']);
Route::post('importType', [WordController::class, 'importType']);

Route::get('getPopulation/{code}', [UsersController::class, 'getPopulation']);
/**/
Route::get('getHito/{blade}', [DebtsController::class, 'getHito']);

Route::get('loadActuations/{phase}', [ClaimsController::class, 'loadActuations']);


Route::post('import-actuations', [ClaimsController::class, 'importActuations']);



Route::get('addCountEmail/{id}', [ClaimsController::class, 'addCountEmail']);
Route::get('testEmail/{email?}/{template?}', [UsersController::class, 'testEmail']);

Route::get('sendEmailsCron', [ClaimsController::class, 'sendEmailsCron'])->middleware('guest');

/* Ruta publica para mensajes y notificaciones generales */
/*Route::get('info', function(){
    return view('info-public')->with('msj','¡Estás a un paso de decir adiós a las facturas impagadas! Antes de realizar una nueva reclamación, deberás completar tu perfil.');
});*/
Route::get('info/{id}', [ClaimsController::class, 'info']);

Route::post('saveDiscount', [ClaimsController::class, 'saveDiscount']);

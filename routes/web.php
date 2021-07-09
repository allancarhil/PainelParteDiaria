<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

#Us36 Routes

Route::post('/us36', [App\Http\Controllers\Us36Controller::class, 'data'])->middleware('auth');
Route::get('/us36/form', [App\Http\Controllers\Us36Controller::class, 'form'])->middleware('auth');
Route::post('us36/{id}/pdf', [App\Http\Controllers\Us36Controller::class, 'exportPDF'])->name('pdf');
Route::get('us36/excel', [App\Http\Controllers\Us36Controller::class, 'exportExcel'])->name('excel');

#End Us36 Routes

#Us06 Routes
Route::post('/us06', [App\Http\Controllers\Us06Controller::class, 'data'])->middleware('auth');
Route::get('/us06/form', [App\Http\Controllers\Us06Controller::class, 'form'])->middleware('auth');
Route::post('us06/{id}/pdf', [App\Http\Controllers\Us06Controller::class, 'exportPDF'])->name('pdf');
#End Us06 Routes

#Mn01 Routes

Route::post('/mn01', [App\Http\Controllers\Mn01Controller::class, 'data'])->middleware('auth');
Route::get('/mn01/form', [App\Http\Controllers\Mn01Controller::class, 'form'])->middleware('auth');
Route::post('mn01/{id}/pdf', [App\Http\Controllers\Mn01Controller::class, 'exportPDF'])->name('pdf');
#End Mn01 Routes

#Ut07 Routes
Route::post('/ut07', [App\Http\Controllers\Ut07Controller::class, 'data'])->middleware('auth');
Route::get('/ut07/form', [App\Http\Controllers\Ut07Controller::class, 'form'])->middleware('auth');
Route::post('ut07/{id}/pdf', [App\Http\Controllers\Ut07Controller::class, 'exportPDF'])->name('pdf');
Route::get('ut07/excel', [App\Http\Controllers\Ut07Controller::class, 'exportExcel'])->name('excel');
#End Ut07 Routes

#Ut08 Routes
Route::post('/ut08', [App\Http\Controllers\Ut08Controller::class, 'data'])->middleware('auth');
Route::get('/ut08/form', [App\Http\Controllers\Ut08Controller::class, 'form'])->middleware('auth');
Route::post('ut08/{id}/pdf', [App\Http\Controllers\Ut08Controller::class, 'exportPDF'])->name('pdf');
#End Ut08 Routes

#Ut37 Routes
Route::post('/ut37', [App\Http\Controllers\Ut37Controller::class, 'data'])->middleware('auth');
Route::get('/ut37/form', [App\Http\Controllers\Ut37Controller::class, 'form'])->middleware('auth');
Route::post('ut37/{id}/pdf', [App\Http\Controllers\Ut37Controller::class, 'exportPDF'])->name('pdf');
#End Ut37 Routes

#Up0507 Routes
Route::post('/up0507', [App\Http\Controllers\Up0507Controller::class, 'data'])->middleware('auth');
Route::get('/up0507/form', [App\Http\Controllers\Up0507Controller::class, 'form'])->middleware('auth');
Route::post('up0507/{id}/pdf', [App\Http\Controllers\Up0507Controller::class, 'exportPDF'])->name('pdf');
#End Up0507 Routes


#Uc06 Routes
Route::post('/uc06', [App\Http\Controllers\Uc06Controller::class, 'data'])->middleware('auth');
Route::get('/uc06/form', [App\Http\Controllers\Uc06Controller::class, 'form'])->middleware('auth');
Route::post('uc06/{id}/pdf', [App\Http\Controllers\Uc06Controller::class, 'exportPDF'])->name('pdf');
#End Uc06 Routes

#Uc07 Routes
Route::post('/uc07', [App\Http\Controllers\Uc07Controller::class, 'data'])->middleware('auth');
Route::get('/uc07/form', [App\Http\Controllers\Uc07Controller::class, 'form'])->middleware('auth');
Route::post('uc07/{id}/pdf', [App\Http\Controllers\Uc07Controller::class, 'exportPDF'])->name('pdf');
#End Uc07 Routes

#Uc11 Routes
Route::post('/uc11', [App\Http\Controllers\Uc11Controller::class, 'data'])->middleware('auth');
Route::get('/uc11/form', [App\Http\Controllers\Uc11Controller::class, 'form'])->middleware('auth');
Route::post('uc11/{id}/pdf', [App\Http\Controllers\Uc11Controller::class, 'exportPDF'])->name('pdf');
#End Uc11 Routes

#Uc13 Routes
Route::post('/uc13', [App\Http\Controllers\Uc13Controller::class, 'data'])->middleware('auth');
Route::get('/uc13/form', [App\Http\Controllers\Uc13Controller::class, 'form'])->middleware('auth');
Route::post('uc13/{id}/pdf', [App\Http\Controllers\Uc13Controller::class, 'exportPDF'])->name('pdf');
#End Uc13 Routes

#Uc14 Routes
Route::post('/uc14', [App\Http\Controllers\Uc14Controller::class, 'data'])->middleware('auth');
Route::get('/uc14/form', [App\Http\Controllers\Uc14Controller::class, 'form'])->middleware('auth');
Route::post('uc14/{id}/pdf', [App\Http\Controllers\Uc14Controller::class, 'exportPDF'])->name('pdf');
#End Uc14 Routes

#Ub02 Routes
Route::post('/ub02', [App\Http\Controllers\Ub02Controller::class, 'data'])->middleware('auth');
Route::get('/ub02/form', [App\Http\Controllers\Ub02Controller::class, 'form'])->middleware('auth');
Route::post('ub02/{id}/pdf', [App\Http\Controllers\Ub02Controller::class, 'exportPDF'])->name('pdf');
Route::get('ub02/excel', [App\Http\Controllers\Ub02Controller::class, 'exportExcel'])->name('excel');
#End Ub02 Routes

#Usina Routes
Route::post('/usina', [App\Http\Controllers\UsinaController::class, 'data'])->middleware('auth');
Route::get('/usina/form', [App\Http\Controllers\UsinaController::class, 'form'])->middleware('auth');
Route::post('usina/{id}/pdf', [App\Http\Controllers\UsinaController::class, 'exportPDF'])->name('pdf');
#End Usina Routes

#Rebritagem Routes
Route::post('/rebritagem', [App\Http\Controllers\RebritagemController::class, 'data'])->middleware('auth');
Route::get('/rebritagem/form', [App\Http\Controllers\RebritagemController::class, 'form'])->middleware('auth');
Route::post('rebritagem/{id}/pdf', [App\Http\Controllers\RebritagemController::class, 'exportPDF'])->name('pdf');
#End Rebritagem Routes


//Resumo Routes
Route::get('/resumo', [App\Http\Controllers\ResumoController::class, 'index'])->middleware('auth');


//Resumo Routes
Route::get('/us36Resumo', [App\Http\Controllers\us36ResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::get('/us06Resumo', [App\Http\Controllers\us06ResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::get('/mn01Resumo', [App\Http\Controllers\mn01ResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::get('/up0507Resumo', [App\Http\Controllers\up0507ResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::post('/ut0708Resumo', [App\Http\Controllers\ut0708ResumoController::class, 'data'])->middleware('auth');
Route::get('/ut0708Resumo/form', [App\Http\Controllers\ut0708ResumoController::class, 'form'])->middleware('auth');
Route::post('ut0708Resumo/{id}/pdf', [App\Http\Controllers\ut0708ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::post('/uc06Resumo', [App\Http\Controllers\uc06ResumoController::class, 'data'])->middleware('auth');
Route::get('/uc06Resumo/form', [App\Http\Controllers\uc06ResumoController::class, 'form'])->middleware('auth');
Route::post('uc06Resumo/{id}/pdf', [App\Http\Controllers\uc06ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::post('/uc07Resumo', [App\Http\Controllers\uc07ResumoController::class, 'data'])->middleware('auth');
Route::get('/uc07Resumo/form', [App\Http\Controllers\uc07ResumoController::class, 'form'])->middleware('auth');
Route::post('uc07Resumo/{id}/pdf', [App\Http\Controllers\uc07ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::post('/uc11Resumo', [App\Http\Controllers\uc11ResumoController::class, 'data'])->middleware('auth');
Route::get('/uc11Resumo/form', [App\Http\Controllers\uc11ResumoController::class, 'form'])->middleware('auth');
Route::post('uc11Resumo/{id}/pdf', [App\Http\Controllers\uc11ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::post('/uc13Resumo', [App\Http\Controllers\uc13ResumoController::class, 'data'])->middleware('auth');
Route::get('/uc13Resumo/form', [App\Http\Controllers\uc13ResumoController::class, 'form'])->middleware('auth');
Route::post('uc13Resumo/{id}/pdf', [App\Http\Controllers\uc13ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::post('/uc14Resumo', [App\Http\Controllers\uc14ResumoController::class, 'data'])->middleware('auth');
Route::get('/uc14Resumo/form', [App\Http\Controllers\uc14ResumoController::class, 'form'])->middleware('auth');
Route::post('uc14Resumo/{id}/pdf', [App\Http\Controllers\uc14ResumoController::class, 'exportPDF'])->name('pdf');
//Resumo Routes
Route::get('/ub02Resumo', [App\Http\Controllers\ub02ResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::get('/usinaResumo', [App\Http\Controllers\usinaResumoController::class, 'index'])->middleware('auth');
//Resumo Routes
Route::get('/rebritagemResumo', [App\Http\Controllers\rebritagemResumoController::class, 'index'])->middleware('auth');

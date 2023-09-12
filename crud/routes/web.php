<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LibrosController;
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
    return view('welcome');
});

/*
Route::get('/Empleado', function () {
    return view('Empleado.index');
});
Route::get('Empleado/create',[EmpleadoController::class,'create']);
*/

Route::resource('Empleado',EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::resource('categorias',CategoriasController::class)->middleware('auth');

Route::get('/home', [CategoriasController::class, 'index'])->name('home');

Route::resource('libros',LibrosController::class)->middleware('auth');

Route::get('/home', [LibrosController::class, 'index'])->name('home');

Route::get('/home/libros/pdf', [LibrosController::class, 'pdf'])->name('libros.pdf');

Route::get('/read', function(){
    dump(DB::select('EXEC PDFCreature'));
});

Route::group(['middleware'=>'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});


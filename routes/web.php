<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlador_index;

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

Route::get('/', [controlador_index::class, 'index']);

// Route::get('/index', [controlador_index::class, 'index']);

//Llama a la función de la clase controlador_index para visualizar los articulos con la opcion de editarlos.
Route::get('/dashboard', [controlador_index::class, 'indexLogged'])->middleware(['auth', 'verified'])->name('dashboard');

//Llama a la función de la clase controlador_index para mostrar la pagina de edicion del articulo seleccionado.
Route::get('/dashboard/{articulo}', [controlador_index::class, 'edit'])->name('dashboard.edit');

//Llama a la función de la clase controlador_index para editar un articulo.
Route::post('/dashboard/{articulo}', [controlador_index::class, 'update'])->name('dashboard.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

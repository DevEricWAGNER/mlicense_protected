<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect(route('home'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [UserController::class, 'index'])->name('home');

    Route::group(['prefix' => 'script'], function () {
        Route::get('/create', [UserController::class, 'createscript'])->name('script.create');
        Route::post('/create', [UserController::class, 'storescript'])->name('script.store');
        Route::delete('/delete/{script}', [UserController::class, 'deletescript'])->name('script.delete');
        Route::put('/activation/{script}', [UserController::class, 'activationscript'])->name('script.activation');
        Route::get('/edit/{script}', [UserController::class, 'editscript'])->name('script.edit');
        Route::put('/edit/{script}', [UserController::class, 'updatescript'])->name('script.update');
    });

    Route::group(['prefix' => 'annonce'], function () {
        Route::get('/', [UserController::class, 'indexannonce'])->name('annonce.index');
        Route::get('/create', [UserController::class, 'createannonce'])->name('annonce.create');
        Route::post('/create', [UserController::class, 'storeannonce'])->name('annonce.store');
        Route::delete('/delete/{annonce}', [UserController::class, 'deleteannonce'])->name('annonce.delete');
        Route::put('/activation/{annonce}', [UserController::class, 'activationannonce'])->name('annonce.activation');
        Route::get('/edit/{annonce}', [UserController::class, 'editannonce'])->name('annonce.edit');
        Route::put('/edit/{annonce}', [UserController::class, 'updateannonce'])->name('annonce.update');
    });

    Route::group(['prefix' => 'license'], function () {
        Route::get('/create', [UserController::class, 'createlicense'])->name('license.create');
        Route::post('/create', [UserController::class, 'storelicense'])->name('license.store');
        Route::delete('/delete/{license}', [UserController::class, 'deletelicense'])->name('license.delete');
        Route::put('/activation/{license}', [UserController::class, 'activationlicense'])->name('license.activation');
        Route::get('/edit/{license}', [UserController::class, 'editlicense'])->name('license.edit');
        Route::put('/edit/{license}', [UserController::class, 'updatelicense'])->name('license.update');
        Route::get('/add-ip/{script}', [UserController::class, 'addip'])->name('license.addip');
        Route::get('/show-ips/{script}', [UserController::class, 'showips'])->name('license.showips');
    });

    Route::get('/api/download/{script}', [UserController::class, 'downloadscript'])->name('script.download');
    Route::post('/api/check', [UserController::class, 'checkscript'])->name('script.check');
    Route::get('/tests', [UserController::class, 'tests'])->name('tests');

    Route::group(['prefix' => 'logs'], function() {
        Route::get('/', [UserController::class, 'indexlogs'])->name('logs.index');
        Route::get('/show/{log}', [UserController::class, 'showlog'])->name('logs.show');
        Route::delete('/delete/{log}', [UserController::class, 'deletelog'])->name('logs.delete');
    });
});

require __DIR__.'/auth.php';

<?php

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
    return view('welcome');
});

Route::get('/generate-password', [App\Http\Controllers\PasswordController::class, 'generate']);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'getLogin'])->name('login');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'submitLogin'])->name('login.submit');

Route::middleware(['auth:client'])->group(function () {
    
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'submitLogout'])->name('logout');
    
    Route::get('/user-management', [App\Http\Controllers\UserManagementController::class, 'getPage'])->name('user-management');

    Route::get('/all-sub-user', [App\Http\Controllers\UserManagementController::class, 'getAllSubUsers'])->name('all-sub-user');

    Route::post('/add-sub-user', [App\Http\Controllers\UserManagementController::class, 'addUsers'])->name('add-sub-user');

    Route::post('/update-sub-user', [App\Http\Controllers\UserManagementController::class, 'updateUsers'])->name('update-sub-user');

    Route::delete('/delete-sub-user/{id}', [App\Http\Controllers\UserManagementController::class, 'deleteUser'])->name('delete-sub-user');

});



Route::get('/run-all-commands', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();

    // Clear Cache
    Artisan::call('optimize:clear', [], $output);
    
    // Create Storage Link
    Artisan::call('storage:link', [], $output);

    Artisan::call('optimize', [], $output);
    // Route Cache
    Artisan::call('route:cache', [], $output);
    // Clear Route Cache
    Artisan::call('route:clear', [], $output);
    // Clear View Cache
    Artisan::call('view:clear', [], $output);
    // Clear Config Cache
    Artisan::call('config:cache', [], $output);
    // Clear Config Cache (again, if necessary)
    Artisan::call('config:clear', [], $output);

    echo '<pre>';
    return $output->fetch();
})->name('run-all-commands');
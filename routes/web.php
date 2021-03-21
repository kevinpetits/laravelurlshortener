<?php

use App\Http\Controllers\UrlController;
use App\Models\Url;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('list', [UrlController::class, 'index'])->name('urls.index');
});


require __DIR__.'/auth.php';

Route::get('{code}', 'App\Http\Controllers\UrlController@show');

Route::post('url', [UrlController::class, 'store']);

Route::put('updateurl', [UrlController::class, 'update']);

Route::delete('deleteurl/{code}', [UrlController::class, 'delete']);

<?php

use App\Models\Link;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use Carbon\Carbon;

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

require __DIR__.'/auth.php';

Route::get('/',[LinkController::class, 'create'])
        ->name('links.create');

Route::get('/links', [LinkController::class, 'index'])
        ->middleware(['auth'])
        ->name('links');

Route::get('/links/{slug}', [LinkController::class, 'result'] )
        ->name('links.result');



        
Route::get('{link:slug}', function(Link $link){
    
    if( $link->expires_at < Carbon::now()){
        abort(404);
    }

    return redirect()->to($link->url);

})->name('redirect');

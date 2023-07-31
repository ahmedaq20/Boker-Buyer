<?php

use App\Http\Controllers\BrokerController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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




// Route::middleware('guest:broker')->group(function(){
// });
//Rout Register
Route::get('broker/register', [BrokerController::class,'broker_register'])->name('broker_register');
Route::post('broker/register', [BrokerController::class,'register_store'])->name('register.store');


//Route Login
Route::get('broker/login', [BrokerController::class,'broker_login'])->name('broker.login');
Route::Post('broker/login/check', [BrokerController::class,'check'])->name('login.check');






// Route Logout

// Route with middleware

require __DIR__.'/auth.php';



// guard Route

Route::prefix('broker')->name('broker.')->middleware('broker')->group(function(){
    Route::get('/index', function () {
        $posts = posts::orderBy('created_at', 'desc')->take(4)->get();
        $categorys  = category::all();
        $user= Auth::user();
        return view('Broker.index',compact('posts', 'categorys','user'));
    })->name('main');

    Route::post('logout', [BrokerController::class,'logout'])->name('logout');
//     Route::post('logout', function ()
// {
//     auth()->logout();
//     Session()->flush();

//     return Redirect::to('broker.login');
// })->name('broker.logout');
// Posts Route
Route::resource('posts', BrokerController::class);
// Route::get('profile',[BrokerController::class,'profile'])->name('profile');

Route::post('posts/saves', [BrokerController::class, 'save_post'])->name('save');
Route::get('posts/saves/index', [BrokerController::class, 'save_post_index'])->name('save_index');




//Comments Route
Route::resource('comments', CommentsController::class);


//profile routes
Route::get('profile/info', [BrokerController::class,'broker_profile_info'])->name('profile_info');
Route::post('profile/info/edit', [BrokerController::class,'profile_store_info'])->name('profile.create');

Route::get('Contracts',[CommentsController::class,'Contracts'])->name('Contracts');

//searche Route
Route::get('search', [BrokerController::class,'broker_search_index'])->name('search_index');
Route::get('servie/search', [BrokerController::class,'broker_search_servie'])->name('search_servie');
// Notification route
Route::get('notification', [BrokerController::class,'history'])->name('notification');




});












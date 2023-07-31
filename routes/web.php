<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware('web')->group(function(){

// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/broker.php';


// Route::get('/', function () {
//     $posts = posts::orderBy('created_at', 'desc')->take(4)->get();
//     $categorys  = category::all();
//     $users= Auth::user();
//     return view('index',compact('posts', 'categorys','users'));
// });
//comments routes
Route::resource('comments', CommentsController::class);
Route::get('offer',[CommentsController::class,'offer'])->name('offer');

// Post Routs
Route::get('/posts/all', [PostsController::class, 'all_post'])->name('posts.all');
Route::resource('posts', PostsController::class);
Route::post('/posts/saves', [PostsController::class, 'save_post'])->name('posts.save');
Route::get('/posts/saves/index', [PostsController::class, 'save_post_index'])->name('posts_save.index');



//profile routes
Route::get('user/profile', [PostsController::class,'profile_info'])->name('profile_info');
Route::post('user/info/edit/{id}', [PostsController::class,'profile_store_info'])->name('profile.create');

Route::get('profile/info/{id}', [PostsController::class,'profile_broker_info'])->name('profile.broker');



// search Routes
Route::get('user/search', [PostsController::class,'search_index'])->name('search_index');
Route::get('user/servie/search', [PostsController::class,'search_servie'])->name('search_servie');


Route::get('user/notification', [PostsController::class,'history'])->name('notification');


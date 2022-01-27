<?php


use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CategoryController as CategoryFrontController;
use App\Http\Controllers\frontend\PostController as PostFrontController;
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

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/category',[CategoryFrontController::class, 'category'])->name('category');
Route::get('/category/{slug}',[CategoryFrontController::class, 'categoryPost'])->name('categoryPost');
Route::get('/post/{slug}',[PostFrontController::class, 'post'])->name('post');
Route::get('/posts',[PostFrontController::class, 'posts'])->name('posts');

Route::post('/post/comment/store',[CommentController::class, 'store']);
Route::get('/post/getComments/{post}',[CommentController::class, 'getComments']);

Route::get('/markAsRead',function()
{
    auth()->user()->unreadNotifications->markAsRead();
});



Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware'=>['auth']], function ()
{
    Route::get('/dashboard',DashboardController::class)->name('dashboard');

    Route::resource('post' ,PostController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('user', UserController::class)->middleware('role:Admin');
    Route::resource('role', RoleController::class)->middleware('role:Admin');
    Route::resource('profile', ProfileController::class);

    Route::get('/permission', PermissionController::class)->name('permission.index')->middleware('role:Admin');

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


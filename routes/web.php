<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogsController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::name('blogs_path')-> get('/blogs',[BlogsController::class, 'index']);
Route::name('create_blog_path')-> get('/blogs/create',[BlogsController::class, 'create']);
Route::name('store_blog_path')-> post('/blogs',[BlogsController::class, 'store']);
Route::name('blog_path')->get('/blogs/{id}',[BlogsController::class, 'show']);
Route::name('edit_blog_path')->get('/blogs/{id}/edit' , [BlogsController::class, 'edit'] );

Route::name('update_blog_path')->put('/blogs/{id}' ,  [BlogsController::class, 'update']  );
Route::name('delete_blog_path')->delete('/blogs/{id}' , [BlogsController::class, 'destroy']  );





<?php

use App\Http\Controllers\zenBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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


 Route::get('/',[zenBlogController::class,'index'])->name('home');
 Route::get('/about', [zenBlogController::class, 'about'])->name('about');
 Route::get('/blog-detlies/{slug}', [zenBlogController::class, 'blogDet'])->name('blog.detlies');
 Route::get('/category-front/{catId}', [zenBlogController::class, 'category'])->name('category.front');
 Route::get('/contect', [zenBlogController::class, 'contect'])->name('contect');


Route::get('/user-register', [zenBlogController::class, 'userRegister'])->name('user.register');
Route::post('/register-user', [zenBlogController::class, 'saveRegister'])->name('register.user');
Route::get('/user-login', [zenBlogController::class, 'userLogin'])->name('user.login');
Route::post('/login-user', [zenBlogController::class, 'checkLogin'])->name('login.user');
Route::get('/user-logout', [zenBlogController::class, 'logoutUser'])->name('user.logout');

Route::post('/new-comment', [CommentController::class, 'saveComment'])->name('new.comment');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/category', [CategoryController::class,'index'])->name('category');
Route::post('/new_category', [CategoryController::class, 'saveCategory'])->name('new.category');

Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::post('/new_author', [AuthorController::class, 'saveAuthor'])->name('new.author');

Route::get('/add_blog', [BlogController::class, 'index'])->name('add.blog');
Route::get('/manage_blog', [BlogController::class, 'manegeBlog'])->name('manage.blog');
Route::post('/new_blog', [BlogController::class, 'saveBlog'])->name('new.blog');
Route::get('/status/{id}', [BlogController::class, 'status'])->name('status');
Route::post('/blog-delete', [BlogController::class, 'blogDelete'])->name('blog.delete');
Route::get('/editBlog/{id}', [BlogController::class, 'editBlog'])->name('editBlog');
Route::post('/update-blog', [BlogController::class, 'updateBlog'])->name('update.blog');












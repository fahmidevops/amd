<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Komponen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminKomponenController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardAgendaController;
use App\Http\Controllers\DashboardDocController;
use App\Http\Controllers\DashboardDocumentController;
use App\Http\Controllers\DashboardLapAgendaController;
use App\Http\Controllers\FullCalendarController;

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


// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         "active" => "home"

//     ]);
// });




// Route::get('/email', [EmailController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']); //halaman single post, kalau wildcard hanya {post} ini akan mencari id, tapi klo ingin yg di cari slug nya, maka tambahkan post:slug

Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/',  [AgendaController::class, 'home']);


// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         "active" => "categories",
//         'categories' => Category::all()
//     ]);
// });

// Route::get('/komponen', function () {
//     return view('komponens', [
//         'title' => 'Komponen',
//         'active' => 'komponen',
//         'komponens' => Komponen::all()
//     ]);
// });



// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         "active" => "categories",
//         'posts' => $category->post->load('category', 'author')
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => "posts",
//         'posts' => $author->post->load('category', 'author')
//     ]);
// });

//sebuah route bisa dibuat nama alias (named routes) supaya tidak berpatokan pada routes URL nya > app>providers>RouteServiceProvider.php
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //guest adalah midleware yg digunakan untuk user yg belum login. halaman ini untuk user belum login | ->name('login') ini nama alias sebuat routing berdasarkan return route('login') di middleware/authenticate
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth'); // auth adalah midleware untuk user yg sudah login, halaman ini untuk user yang sudah login
// Route::get('/dashboard', function () {
//     return view('dashboard.index', [
//         'coba' => 'satu hasilnya'
//     ]);
// })->middleware('auth'); // auth adalah midleware untuk user yg sudah login, halaman ini untuk user yang sudah login

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/agendas/checkSlug', [DashboardAgendaController::class, 'checkSlug'])->middleware('auth');
//method resource, kalau begini tidak bisa menggunakan slug(route model binding)
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::resource('/dashboard/agendas', DashboardAgendaController::class)->middleware('auth');

// Route::resource('/dashboard/documents', DashboardDocumentController::class)->middleware('auth');

Route::resource('/dashboard/documents', DashboardDocController::class)->middleware('auth');

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin'); //except pengecualian, untuk method show tidak digunakan, sehingga lebih baik di nonaktifkan saja, dengan perintah except
// Route::resource('/dashboard/staff', AdminStaffController::class)->except(['show', 'destroy'])->middleware('admin');
// Route::resource('/dashboard/{staff}', AdminStaffController::class)->middleware('admin');
// Route::resource('/dashboard/komponen', AdminKomponenController::class)->except(['show', 'destroy'])->middleware('admin');

Route::get('/dashboard/reports_agendas', [DashboardLapAgendaController::class, 'index'])->middleware('auth');

Route::get('/dashboard/reports_agendas/printpdf', [DashboardLapAgendaController::class, 'printpdf'])->middleware('auth');



// Route::get('full-calendar', [FullCalendarController::class, 'index']);

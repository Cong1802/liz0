<?php

use App\Http\Controllers\Shop\ContactController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\PageController;
use App\Http\Controllers\Shop\PostController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\User\NewsController;
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
//SitemapGenerator::create(config('app.url')->writeToFile(public_path('sitemap.xml'));

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search');

Route::get('/lien-he', [ContactController::class, 'index'])->name('page.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact-email', [ContactController::class, 'subscribeEmail'])->name('contact.subscribe_email');
Route::post('/logins', [LoginController::class, 'postLogin']);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store']);
Route::get('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
Route::post('/news/update/{id}', [NewsController::class, 'edit']);

Route::delete('/news', [NewsController::class, 'delete'])->name('news.delete');

Auth::routes();

Route::get('/bai-viet', [PostController::class, 'index'])->name('post.index');
Route::get('/bai-viet/{post:slug?}', [PostController::class, 'show'])->name('post.show');

Route::get('/trang/{page:slug?}', [PageController::class, 'show'])->name('page.show');

//Search Location
Route::get('/search-district', [DistrictController::class, 'searchByCity']);
Route::get('/search-ward', [WardController::class, 'searchByDistrict']);

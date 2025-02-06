<?php

use App\Http\Controllers\ApaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPublicationController;
use App\Http\Controllers\UserResearchController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Auth::routes(['register'=>false]);
//Language Translation
Route::get('index/{locale}', [HomeController::class, 'lang']);

//Update User Details
Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');
Route::get('admin/{any}', [HomeController::class, 'index'])->name('index');


/*
|--------------------------------------------------------------------------
| Main page Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'root'])->name('root');

Route::get('contact-us', [SinglePageController::class, 'contact'])->name('contact');

Route::get('gallery', [SinglePageController::class, 'gallery'])->name('gallery');
Route::get('about', [SinglePageController::class, 'about'])->name('about');
Route::get('news', [SinglePageController::class, 'news'])->name('news');
Route::get('news/{news_slug}', [SinglePageController::class, 'news_show'])->name('news.show');
Route::get('auction-sheet-guide', [SinglePageController::class, 'auctionSheetGuide'])->name('auction-sheet-guide');
Route::get('vehicles', [SinglePageController::class, 'vehicles'])->name('vehicles');
Route::get('vehicles/{vehicle_slug}', [SinglePageController::class, 'vehicles_show'])->name('vehicles.show');

Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::post('send-message', [HomeController::class, 'sendMessage'])->name('send-message');
Route::post('filter-vehicle', [HomeController::class, 'filterVehicle'])->name('filter-vehicle');
Route::get('vehicles/brand/{brand}', [HomeController::class, 'vehiclesByBrand'])->name('vehicles.brand');
Route::get('vehicles/year/{year}', [HomeController::class, 'vehiclesByYear'])->name('vehicles.year');


Route::get('journal', [FrontController::class, 'journal'])->name('journal.index');
Route::get('journal/{journal_slug}', [FrontController::class, 'journal_show'])->name('journal.show');
Route::get('journal/volume/{volume_slug}', [FrontController::class, 'volume_journal_show'])->name('volume.journal.show');
Route::get('journal/volume/{id}/details', [FrontController::class, 'volume_read'])->name('volume.journal.read');

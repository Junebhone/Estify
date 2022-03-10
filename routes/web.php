<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CityContoller;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ListingController as AdminListingController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\ListingController as FrontendListingController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/all-listings', [FrontendListingController::class, 'index'])->name('all.listings');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // auth()->user()->assignRole('admin');
    return view('dashboard');
})->name('dashboard');





Route::post('upload', [UploadController::class, 'store'])->name('upload');
Route::delete('upload/delete', [UploadController::class, 'delete'])->name('delete');

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('listings', AdminListingController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('childcategories', ChildCategoryController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityContoller::class);
});



Route::resource('listings', ListingController::class)->middleware('auth');
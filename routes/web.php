<?php

use App\Models\Package;
use App\Models\Background;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OtherPackageController;
use App\Http\Controllers\WeddingPackageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutUsManagementController;
use App\Http\Controllers\Admin\GalleryManagementController;
use App\Http\Controllers\Admin\PackageManagementController;
use App\Http\Controllers\SelfPhotoPhotoboxPackageController;
use App\Http\Controllers\Admin\BackgroundManagementController;
use App\Http\Controllers\Admin\ReservationManagementController;
use App\Http\Controllers\Admin\PhotographerManagementController;
use App\Http\Controllers\Admin\SelfPhotoPhotoboxManagementController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/selfphoto', [SelfPhotoPhotoboxManagementController::class, 'index'])->name('selfphoto.index');
    Route::delete('/selfphoto/{id}', [SelfPhotoPhotoboxManagementController::class, 'destroy'])->name('selfphoto.destroy');
});

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/', [LandingPageController::class, 'aboutUs'])->name('home');
Route::get('/', [LandingPageController::class, 'getSliderImages'])->name('home');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', [HomeController::class, 'aboutUs'])->name('home');
Route::get('/home', [HomeController::class, 'getSliderImages'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/pricelist', function () {
    return view('pricelist');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('reservations', ReservationManagementController::class);
    Route::resource('galleries', GalleryManagementController::class);
    Route::resource('photographers', PhotographerManagementController::class);
    Route::resource('backgrounds', BackgroundManagementController::class);
    Route::resource('packages', PackageManagementController::class);
    Route::resource('about-us', AboutUsManagementController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

    Route::get('/ratings/{reservationId}/create', [RatingController::class, 'create'])->name('ratings.create');
    Route::post('/ratings/{reservationId}/store', [RatingController::class, 'store'])->name('ratings.store');

    Route::get('selfphoto-photobox-package', [SelfPhotoPhotoboxPackageController::class, 'create'])->name('selfphoto-photobox-package.create');
    Route::post('selfphoto-photobox-package/store', [SelfPhotoPhotoboxPackageController::class, 'store'])->name('selfphoto-photobox-package.store');
    Route::get('selfphoto-photobox-package/transfer/{id}', [SelfPhotoPhotoboxPackageController::class, 'transfer'])->name('selfphoto-photobox-package.transfer');
    Route::post('selfphoto-photobox-package/upload-proof', [SelfPhotoPhotoboxPackageController::class, 'uploadProof'])->name('selfphoto-photobox-package.upload-proof');
    Route::get('selfphoto-photobox-package/resi/{id}', [SelfPhotoPhotoboxPackageController::class, 'showResi'])->name('selfphoto-photobox-package.resi');
    Route::post('selfphoto-photobox-package/confirm/{id}', [SelfPhotoPhotoboxPackageController::class, 'confirm'])->name('selfphoto-photobox-package.confirm');

    Route::get('wedding-package', [WeddingPackageController::class, 'create'])->name('wedding-package.create');
    Route::post('wedding-package/store', [WeddingPackageController::class, 'store'])->name('wedding-package.store');
    Route::get('wedding-package/transfer/{id}', [WeddingPackageController::class, 'transfer'])->name('wedding-package.transfer');
    Route::post('wedding-package/upload-proof', [WeddingPackageController::class, 'uploadProof'])->name('wedding-package.upload-proof');
    Route::get('wedding-package/resi/{id}', [WeddingPackageController::class, 'showResi'])->name('wedding-package.resi');
    Route::post('wedding-package/confirm/{id}', [WeddingPackageController::class, 'confirm'])->name('wedding-package.confirm');

    Route::get('other-package', [OtherPackageController::class, 'create'])->name('other-package.create');
    Route::post('other-package/store', [OtherPackageController::class, 'store'])->name('other-package.store');
    Route::get('other-package/transfer/{id}', [OtherPackageController::class, 'transfer'])->name('other-package.transfer');
    Route::post('other-package/upload-proof', [OtherPackageController::class, 'uploadProof'])->name('other-package.upload-proof');
    Route::get('other-package/resi/{id}', [OtherPackageController::class, 'showResi'])->name('other-package.resi');
    Route::post('other-package/confirm/{id}', [OtherPackageController::class, 'confirm'])->name('other-package.confirm');
});

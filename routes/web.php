<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SitestatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserpageController;
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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//customer route
Route::middleware(['auth'])->group(function () {
    Route::get('/customer', [PagesController::class, 'index'])->name('pages.customer');
    Route::get('/developer', [PagesController::class, 'developer'])->name('pages.developer');
    Route::get('/blog', [PagesController::class, 'blog'])->name('pages.blog');
    Route::get('/events', [PagesController::class, 'events'])->name('pages.events');
    Route::get('/tasks', [PagesController::class, 'tasks'])->name('pages.tasks');
    Route::get('/telegram_managment', [PagesController::class, 'telegram_managment'])->name('pages.telegram_managment');
    Route::get('/learn_dashboard', [PagesController::class, 'learn_dashboard'])->name('pages.learn_dashboard');
    Route::get('/docs', [PagesController::class, 'docs'])->name('pages.docs');
    Route::get('/classes', [PagesController::class, 'classes'])->name('pages.classes');
    Route::get('/attendance', [PagesController::class, 'attendance'])->name('pages.attendance');
    Route::get('/students_dash', [PagesController::class, 'students_dash'])->name('pages.students_dash');
    Route::get('/certificates', [PagesController::class, 'certificates'])->name('pages.certificates');
});
//editing function for users
Route::middleware(['auth'])->group(function () {
    Route::get('/customer_edit/{id}', [PagesController::class, 'customer_edit'])->name('customer_edit');
    Route::put('/customer_edit/{id}', [PagesController::class, 'customer_update'])->name('customer_update');
    Route::delete('/customer_delete/{id}', [PagesController::class, 'customer_delete'])->name('customer_delete');
    Route::get('/customer_detail/{id}', [PagesController::class, 'showcustomer'])->name('customer_detail');
});

//editing function for devs
Route::middleware(['auth'])->group(function () {
    Route::get('/developer_edit/{id}', [PagesController::class, 'developer_edit'])->name('developer_edit');
    Route::put('/developer_edit/{id}', [PagesController::class, 'developer_update'])->name('developer_update');
    Route::delete('/developer_delete/{id}', [PagesController::class, 'developer_delete'])->name('developer_delete');
    Route::get('/developer_detail/{id}', [PagesController::class, 'showdeveloper'])->name('developer_detail');
});
//user
Route::middleware(['auth'])->group(function () {
    Route::get('/userspage', [UserpageController::class, 'index'])->name('userpages');
    Route::get('userpages/{id}/edit', [UserpageController::class, 'edit'])->name('userpages.edit');
    Route::put('userpages/{id}', [UserpageController::class, 'update'])->name('userpages.update');
});
//sites controlling
Route::middleware(['auth'])->group(function () {
    Route::get('/community/{id}/config', [SitestatController::class, 'community_config'])->name('community.community_config');
    Route::put('/community/config/update/{id}', [SitestatController::class, 'community_config_update'])->name('community.config_update');
    Route::get('/blogs/config', [SitestatController::class, 'config'])->name('blogs.config');
    Route::get('/blogs/config/{id}/edit', [SitestatController::class, 'config_edit'])->name('blogs.config_edit');
    Route::put('/blogs/config/{id}/edit', [SitestatController::class, 'config_update'])->name('blogs.config_update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/index', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/all', [BlogController::class, 'all'])->name('blogs.all');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::get('/blogs/detail/{id}', [BlogController::class, 'detail'])->name('blogs.detail');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});
//events
Route::middleware(['auth'])->group(function () {
    Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
    Route::get('/events/detail/{events}', [EventsController::class, 'eventdetail'])->name('events.detail');
});
// pages
Route::middleware(['auth'])->group(function () {
    Route::get('/community', [UserController::class, 'showCommunity'])->name('community.community');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// register blocker

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('block.register');
Route::post('register', [RegisterController::class, 'register'])->middleware('block.register');

Route::get('register', function () {
    abort(403, 'Access denied');
})->name('register');

Route::post('register', function () {
    abort(403, 'Access denied');
});

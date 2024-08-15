<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SitestatController;
use App\Http\Controllers\StudentController;
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
    Route::get('/status', [LandingController::class, 'index'])->name('landing');
    Route::get('/landing/config/{id}', [LandingController::class, 'config'])->name('landing.config');
    Route::put('landing/{id}', [LandingController::class, 'update'])->name('landing.update');
    Route::get('/maintenance', [LandingController::class, 'maintenance'])->name('landing.maintenance');
    Route::get('/maintenance/{id}', [LandingController::class, 'maintain'])->name('landing.maintain');
});

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

Route::middleware(['auth'])->group(function () {
    Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
    Route::get('/events', [EventsController::class, 'index'])->name('events.index');
    Route::get('/events/index', [EventsController::class, 'index'])->name('events.index');
    Route::get('/events/all', [EventsController::class, 'all'])->name('events.all');
    Route::post('/events', [EventsController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{events}', [EventsController::class, 'edit'])->name('events.edit');
    Route::get('/events/detail/{id}', [EventsController::class, 'detail'])->name('events.detail');
    Route::delete('/events/{events}', [EventsController::class, 'destroy'])->name('events.destroy');
    Route::put('/events/{events}', [EventsController::class, 'update'])->name('events.update');
    Route::delete('/events/{events}', [EventsController::class, 'destroy'])->name('events.destroy');
});
// pages
Route::middleware(['auth'])->group(function () {
    Route::get('/community', [UserController::class, 'showCommunity'])->name('community.community');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

//student related
Route::middleware(['auth'])->group(function () {
    Route::get('/learn_dashboard', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/courses', [CourseController::class, 'courses'])->name('pages.courses');
    Route::get('/courses/search', [CourseController::class, 'filter'])->name('courses.index');
    Route::get('/courses/detail{id}', [CourseController::class, 'detail'])->name('courses.detail');
    Route::get('/courses/edit/{id}', [CourseController::class, 'config'])->name('courses.edit');
    Route::get('/courses/deactivate', [CourseController::class, 'deactivate'])->name('courses.deactivate');
    Route::get('/courses/subsection', [CourseController::class, 'subsection'])->name('subsections.index');
    Route::get('/courses/manage', [CourseController::class, 'manage'])->name('courses.manage');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/subsection/edit/{id}', [CourseController::class, 'edit'])->name('subsection.edit');
    Route::PUT('/courses/subsection/update/{id}', [CourseController::class, 'update'])->name('subsection.update');
    Route::delete('/courses/subsection/{id}', [CourseController::class, 'destroy'])->name('subsection.destroy');
    Route::get('/courses/subsection/create/{id}', [CourseController::class, 'sub_create'])->name('subsection.create');
    Route::post('/courses/subsection/create', [CourseController::class, 'sub_store'])->name('subsection.store');
    Route::get('/courses/subsection/module/{id}', [CourseController::class, 'module'])->name('subsection.module');
    Route::post('/courses/subsection/module/store/{id}', [CourseController::class, 'module_store'])->name('module.store');
    Route::get('/attendance', [StudentController::class, 'attendance'])->name('pages.attendance');
    Route::get('/students_dash', [StudentController::class, 'students_dash'])->name('pages.students_dash');
    Route::get('/certificates', [StudentController::class, 'certificates'])->name('pages.certificates');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::post('/students/approve/{id}', [StudentController::class, 'approve'])->name('students.approve');
    Route::post('/Students/store', [StudentController::class, 'store'])->name('students.store');
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

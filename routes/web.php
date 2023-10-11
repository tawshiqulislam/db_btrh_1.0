<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectInitiationController;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//admin panel
Route::get('/admin', [BackendController::class, 'admin'])->name('admin.dashboard');

//admin security question routes
Route::prefix('admin/security_question')->group(function () {
    Route::get('/index', [SecurityQuestionController::class, 'index'])->name('security_question.index');
    Route::get('/create', [SecurityQuestionController::class, 'create'])->name('security_question.create');
    Route::post('/store', [SecurityQuestionController::class, 'store'])->name('security_question.store');
    Route::get('/delete/{id}', [SecurityQuestionController::class, 'delete'])->name('security_question.delete');
    Route::get('/edit/{id}', [SecurityQuestionController::class, 'edit'])->name('security_question.edit');
    Route::post('/update/{id}', [SecurityQuestionController::class, 'update'])->name('security_question.update');
    Route::get('/info/{id}', [SecurityQuestionController::class, 'info'])->name('security_question.info');
});

//admin user routes
Route::prefix('admin/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/info/{id}', [UserController::class, 'info'])->name('user.info');
    Route::get('/remove_profile_picture/{id}', [UserController::class, 'remove_profile_picture'])->name('user.remove_profile_picture');
    Route::post('/update_profile_picture/{id}', [UserController::class, 'update_profile_picture'])->name('user.update_profile_picture');
});

//admin department routes
Route::prefix('admin/department')->group(function () {
    Route::get('/index', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/info/{id}', [DepartmentController::class, 'info'])->name('department.info');
});

//admin project category routes
Route::prefix('admin/project_category')->group(function () {
    Route::get('/index', [ProjectCategoryController::class, 'index'])->name('project_category.index'); //index page
    Route::get('/create', [ProjectCategoryController::class, 'create'])->name('project_category.create'); //create page
    Route::post('/store', [ProjectCategoryController::class, 'store'])->name('project_category.store'); // store
    Route::get('/delete/{id}', [ProjectCategoryController::class, 'delete'])->name('project_category.delete'); // delete
    Route::get('/edit/{id}', [ProjectCategoryController::class, 'edit'])->name('project_category.edit'); //edit page
    Route::post('/update/{id}', [ProjectCategoryController::class, 'update'])->name('project_category.update'); //update
    Route::get('/info/{id}', [ProjectCategoryController::class, 'info'])->name('project_category.info'); //info page
});

//admin project initiation routes
Route::prefix('admin/project_initiation')->group(function () {
    Route::get('/index', [ProjectInitiationController::class, 'index'])->name('project_initiation.index'); //index page
    Route::get('/create', [ProjectInitiationController::class, 'create'])->name('project_initiation.create'); //create page
    Route::post('/store', [ProjectInitiationController::class, 'store'])->name('project_initiation.store'); // store
    Route::get('/delete/{id}', [ProjectInitiationController::class, 'delete'])->name('project_initiation.delete'); // delete
    Route::get('/edit/{id}', [ProjectInitiationController::class, 'edit'])->name('project_initiation.edit'); //edit page
    Route::post('/update/{id}', [ProjectInitiationController::class, 'update'])->name('project_initiation.update'); //update
    Route::get('/info/{id}', [ProjectInitiationController::class, 'info'])->name('project_initiation.info'); //info page
});

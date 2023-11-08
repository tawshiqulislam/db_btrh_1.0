<?php


use App\Http\Controllers\Resource\ResourceController;
use App\Http\Middleware\isVerified;
use Illuminate\Support\Facades\Route;



Route::prefix('admin/resource')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [ResourceController::class, 'index'])->name('resource.index');
    Route::get('/create', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/store', [ResourceController::class, 'store'])->name('resource.store');
    Route::get('/delete/{id}', [ResourceController::class, 'delete'])->name('resource.delete');
    Route::get('/edit/{id}', [ResourceController::class, 'edit'])->name('resource.edit');
    Route::post('/update/{id}', [ResourceController::class, 'update'])->name('resource.update');
    Route::get('/info/{id}', [ResourceController::class, 'info'])->name('resource.info');
    Route::post('/assign_user/{id}', [ResourceController::class, 'assign_user'])->name('resource.assign_user');
    Route::post('/assign_project/{id}', [ResourceController::class, 'assign_project'])->name('resource.assign_project');
});

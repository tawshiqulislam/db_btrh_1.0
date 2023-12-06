<?php

use App\Http\Middleware\isVerified;
use Illuminate\Support\Facades\Route;
use App\Models\DisburseProjectPayment;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyTaskController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SignOffProjectController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectDocumentController;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\ProjectInitiationController;
use App\Http\Controllers\ProjectSubmissionController;
use App\Http\Controllers\DisburseProjectPaymentController;
use App\Models\MonitoringTeam;

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
Route::get('/admin', [BackendController::class, 'admin'])->name('admin.dashboard')->middleware(['auth', isVerified::class]);


//authentication route
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register/store', [AuthenticationController::class, 'register_store'])->name('register.store');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login/store', [AuthenticationController::class, 'login_store'])->name('login.store');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//admin security question routes
Route::prefix('admin/security_question')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [SecurityQuestionController::class, 'index'])->name('security_question.index');
    Route::get('/create', [SecurityQuestionController::class, 'create'])->name('security_question.create');
    Route::post('/store', [SecurityQuestionController::class, 'store'])->name('security_question.store');
    Route::get('/delete/{id}', [SecurityQuestionController::class, 'delete'])->name('security_question.delete');
    Route::get('/edit/{id}', [SecurityQuestionController::class, 'edit'])->name('security_question.edit');
    Route::post('/update/{id}', [SecurityQuestionController::class, 'update'])->name('security_question.update');
    Route::get('/info/{id}', [SecurityQuestionController::class, 'info'])->name('security_question.info');
});

//admin user routes
Route::prefix('admin/user')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/info/{id}', [UserController::class, 'info'])->name('user.info');
    Route::get('/remove_profile_picture/{id}', [UserController::class, 'remove_profile_picture'])->name('user.remove_profile_picture');
    Route::post('/update_profile_picture/{id}', [UserController::class, 'update_profile_picture'])->name('user.update_profile_picture');
    Route::post('/role_assign/{id}', [UserController::class, 'role_assign'])->name('user.role_assign');
    Route::post('/role_delete/{id}', [UserController::class, 'role_delete'])->name('user.role_delete');
    Route::get('/verified/{id}', [UserController::class, 'user_verified'])->name('user.verified');
    Route::get('/unverified/{id}', [UserController::class, 'user_unverified'])->name('user.unverified');
});
//admin vendor routes
//admin user routes
Route::prefix('admin/vendor')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
    Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
    Route::get('/delete/{id}', [VendorController::class, 'delete'])->name('vendor.delete');
    Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
    Route::post('/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
    Route::get('/info/{id}', [VendorController::class, 'info'])->name('vendor.info');
    Route::get('/remove_profile_picture/{id}', [VendorController::class, 'remove_profile_picture'])->name('vendor.remove_profile_picture');
    Route::post('/update_profile_picture/{id}', [VendorController::class, 'update_profile_picture'])->name('vendor.update_profile_picture');
    Route::post('/role_assign/{id}', [VendorController::class, 'role_assign'])->name('vendor.role_assign');
    Route::post('/role_delete/{id}', [VendorController::class, 'role_delete'])->name('vendor.role_delete');
    Route::get('/verified/{id}', [VendorController::class, 'vendor_verified'])->name('vendor.verified');
    Route::get('/unverified/{id}', [VendorController::class, 'vendor_unverified'])->name('vendor.unverified');
});

//admin department routes
Route::prefix('admin/department')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/info/{id}', [DepartmentController::class, 'info'])->name('department.info');
});

//admin project category routes
Route::prefix('admin/project_category')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [ProjectCategoryController::class, 'index'])->name('project_category.index'); //index page
    Route::get('/create', [ProjectCategoryController::class, 'create'])->name('project_category.create'); //create page
    Route::post('/store', [ProjectCategoryController::class, 'store'])->name('project_category.store'); // store
    Route::get('/delete/{id}', [ProjectCategoryController::class, 'delete'])->name('project_category.delete'); // delete
    Route::get('/edit/{id}', [ProjectCategoryController::class, 'edit'])->name('project_category.edit'); //edit page
    Route::post('/update/{id}', [ProjectCategoryController::class, 'update'])->name('project_category.update'); //update
    Route::get('/info/{id}', [ProjectCategoryController::class, 'info'])->name('project_category.info'); //info page
});

//admin project initiation routes
Route::prefix('admin/project_initiation')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [ProjectInitiationController::class, 'index'])->name('project_initiation.index'); //index page
    Route::get('/create', [ProjectInitiationController::class, 'create'])->name('project_initiation.create'); //create page
    Route::post('/store', [ProjectInitiationController::class, 'store'])->name('project_initiation.store'); // store
    Route::get('/delete/{id}', [ProjectInitiationController::class, 'delete'])->name('project_initiation.delete'); // delete
    Route::get('/edit/{id}', [ProjectInitiationController::class, 'edit'])->name('project_initiation.edit'); //edit page
    Route::post('/update/{id}', [ProjectInitiationController::class, 'update'])->name('project_initiation.update'); //update
    Route::get('/info/{id}', [ProjectInitiationController::class, 'info'])->name('project_initiation.info'); //info page
    Route::get('/verify/{id}', [ProjectInitiationController::class, 'verify'])->name('project_initiation.verify'); //project verification
    Route::get('/unverify/{id}', [ProjectInitiationController::class, 'unverify'])->name('project_initiation.unverify'); //project unverification
    Route::get('/active/{id}', [ProjectInitiationController::class, 'active'])->name('project_initiation.active'); //project active
    Route::get('/project_initiation_search', [ProjectInitiationController::class, 'search'])->name('project_initiation.search'); // ajax search
    Route::post('/activate/{id}', [ProjectInitiationController::class, 'activate'])->name('project_initiation.activate'); //project activate
    Route::get('/inactivate/{id}', [ProjectInitiationController::class, 'inactivate'])->name('project_initiation.inactivate');
    Route::get('/delete/overview/{id}', [ProjectInitiationController::class, 'delete_assigned_user'])->name('delete_assigned_user.delete');
    Route::post('/set_time/{id}', [ProjectInitiationController::class, 'set_time'])->name('set_time.store');
    Route::post('/key_deliverable/{id}', [ProjectInitiationController::class, 'create_key_deliverable'])->name('key_deliverable.store');
    Route::get('/key_deliverable/delete/{id}', [ProjectInitiationController::class, 'key_deliverable_delete'])->name('key_deliverable.delete');
    Route::post('/user/designation/{id}', [ProjectInitiationController::class, 'user_designation'])->name('user_designation.store');
    Route::post('/assign_member/{id}', [ProjectInitiationController::class, 'assign_member'])->name('assign_member.store');
    Route::post('/user_assign_task/{id}', [ProjectInitiationController::class, 'user_assign_task'])->name('user_assign_task.store');
    Route::get('/task_approved/{id}', [ProjectInitiationController::class, 'task_approved'])->name('task_approved.update');
    Route::post('/project_submission/{id}', [ProjectSubmissionController::class, 'store'])->name('project_submission.store');
    Route::post('/send_for_disbursing_payment/{id}', [ProjectSubmissionController::class, 'send_for_disbursing_payment'])->name('send_for_disbursing_payment.store');

    //project submission

});

//admin user detail routes
Route::prefix('admin/user_detail')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [UserDetailController::class, 'index'])->name('user_detail.index'); //index page
    Route::get('/create', [UserDetailController::class, 'create'])->name('user_detail.create'); //create page
    Route::post('/store', [UserDetailController::class, 'store'])->name('user_detail.store'); // store
    Route::get('/delete/{id}', [UserDetailController::class, 'delete'])->name('user_detail.delete'); // delete
    Route::get('/edit/{id}', [UserDetailController::class, 'edit'])->name('user_detail.edit'); //edit page
    Route::post('/update/{id}', [UserDetailController::class, 'update'])->name('user_detail.update'); //update
    Route::get('/info/{id}', [UserDetailController::class, 'info'])->name('user_detail.info'); //info page
});

//upload user document routes
Route::prefix('document')->middleware(['auth', isVerified::class])->group(function () {
    Route::post('/store/{id}', [DocumentController::class, 'store'])->name('document.store'); // store
    Route::post('/update/{id}', [DocumentController::class, 'update'])->name('document.update'); // update
    Route::get('/delete/{id}', [DocumentController::class, 'delete'])->name('document.delete'); // update

});

//upload project document routes
Route::prefix('project_document')->middleware(['auth', isVerified::class])->group(function () {
    Route::post('/store/{id}', [ProjectDocumentController::class, 'store'])->name('project_document.store'); // store
    Route::post('/update/{id}', [ProjectDocumentController::class, 'update'])->name('project_document.update'); // update
    Route::get('/delete/{id}', [ProjectDocumentController::class, 'delete'])->name('project_document.delete'); // delete

});

//admin project_status routes
Route::prefix('admin/status')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [StatusController::class, 'index'])->name('status.index');
    Route::get('/create', [StatusController::class, 'create'])->name('status.create');
    Route::post('/store', [StatusController::class, 'store'])->name('status.store');
    Route::get('/delete/{id}', [StatusController::class, 'delete'])->name('status.delete');
    Route::get('/edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
    Route::post('/update/{id}', [StatusController::class, 'update'])->name('status.update');
});

//admin roles routes
Route::prefix('admin/role')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [RoleController::class, 'index'])->name('role.index');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
});

//admin task routes
Route::prefix('admin/task')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/info/{task}', [TaskController::class, 'info'])->name('task.info');
    Route::get('/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/update/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task_accepted_info/{task}', [TaskController::class, 'task_accepted_info'])->name('task_accepted_info.update');
});

//admin my_task routes
Route::prefix('admin/my_task')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [MyTaskController::class, 'index'])->name('my_task.index');
    Route::get('/info/{my_task}', [MyTaskController::class, 'info'])->name('my_task.info');
    Route::post('/change_my_task_status/{my_task}', [MyTaskController::class, 'change_my_task_status'])->name('change_my_task_status.update');
});

//admin designation routes
Route::prefix('admin/designation')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
    Route::get('/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
});

//admin project submission routes
Route::prefix('admin/project_submission')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [ProjectSubmissionController::class, 'index'])->name('project_submission.index');
    Route::get('/info/{project_submission}', [ProjectSubmissionController::class, 'info'])->name('project_submission.info');
    Route::get('/project_submission_approved/{project_submission}', [ProjectSubmissionController::class, 'project_submission_approved'])->name('project_submission.approved');
});

//admin disburse project payment routes
Route::prefix('admin/disburse_project_payment')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [DisburseProjectPaymentController::class, 'index'])->name('disburse_project_payment.index');
    Route::get('/info/{disburse_project_payment}', [DisburseProjectPaymentController::class, 'info'])->name('disburse_project_payment.info');
});
//admin disburse project payment sign off routes
Route::prefix('admin/signoff_project')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [SignOffProjectController::class, 'index'])->name('signoff_project.index');
    Route::get('/info/{signoff_project}', [SignOffProjectController::class, 'info'])->name('signoff_project.info');
    Route::post('/store/{id}', [SignOffProjectController::class, 'store'])->name('signoff_project.store');
});

//admin invoice routes
Route::prefix('admin/invoice')->middleware(['auth', isVerified::class])->group(function () {
    Route::post('/store/{id}', [InvoiceController::class, 'store'])->name('invoice.store');
});


//admin designation routes
Route::prefix('admin/monitoring_team')->middleware(['auth', isVerified::class])->group(function () {
    Route::get('/index', [MonitoringTeam::class, 'index'])->name('monitoring_team.index');
    Route::get('/create', [MonitoringTeam::class, 'create'])->name('monitoring_team.create');
    Route::post('/store', [MonitoringTeam::class, 'store'])->name('monitoring_team.store');
    Route::get('/delete/{id}', [MonitoringTeam::class, 'delete'])->name('monitoring_team.delete');
    Route::get('/edit/{id}', [MonitoringTeam::class, 'edit'])->name('monitoring_team.edit');
    Route::post('/update/{id}', [MonitoringTeam::class, 'update'])->name('monitoring_team.update');
});


//admin resource routes
require __DIR__ . './resource.php';

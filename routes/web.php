<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobtypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\TokenVerificationMiddleware;



Route::get('/',[DemoController::class,'Homepage']);
Route::get('/find-job',[DemoController::class,'FindJob']);
Route::get('/login',[DemoController::class,'LogInpage']);
Route::post('/user-login',[UserController::class,'userlogin']);
Route::post('/user-signin',[UserController::class,'usersignin']);
Route::post('/profile-update',[UserController::class,'UpdateUserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/profile-photo',[UserController::class,'profilephoto'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-profile',[UserController::class,'userprofilelist'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/userRegistration',[DemoController::class,'register']);
Route::get('/job-post',[DemoController::class,'jobjost']);
Route::get('/account',[UserController::class,'accountpage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/my-job',[DemoController::class,'myjobpage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/applied-job',[DemoController::class,'appliedjob']);
Route::get('/save-job',[DemoController::class,'savejobpage']);
Route::get('/job-details',[DemoController::class,'jobdetailspage']);
Route::get('/logout',[UserController::class,'UserLogout']);


/////   job category web 
Route::get('/list-category',[CategoryController::class,'categorylist'])->middleware([TokenVerificationMiddleware::class]);






/////  job type web 
Route::get('/list-jobtype',[JobtypeController::class,'jobtypelist'])->middleware([TokenVerificationMiddleware::class]);




/// Job api web 
Route::post('/job-save',[JobController::class,'userjobcreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-job',[JobController::class,'userjoblist'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/edit-page/{id}',[JobController::class,'editjobpage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/job-update',[JobController::class,'jobupdate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/job-detail/{id}',[JobController::class,'jobdetails'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/apply-job',[JobController::class,'Userjobapply'])->middleware([TokenVerificationMiddleware::class]);


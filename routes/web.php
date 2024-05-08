<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SynopsisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MainController::class, "home"]);
Route::get("/calendar", [MainController::class, "calendar"]);
Route::get("/synopses", [MainController::class, "synopses"]);
Route::get("/about", [MainController::class, "about"]);

Route::get("/dashboard", [DashboardController::class, "dashboard"])->middleware("auth");

Route::get("/dashboard/login", [DashboardController::class, "login"])->name("login");
Route::post("/dashboard/login", [AuthController::class, "login"]);
Route::get("/dashboard/logout", [AuthController::class, "logout"])->middleware("auth");

Route::get("/dashboard/new-event", [DashboardController::class, "newEvent"])->middleware("auth");
Route::post("/dashboard/new-event", [EventController::class, "create"])->middleware("auth");
Route::get("/dashboard/edit-event", [DashboardController::class, "editEvent"])->middleware("auth");
Route::post("/dashboard/edit-event", [EventController::class, "update"])->middleware("auth");
Route::get("/dashboard/delete-event", [EventController::class, "delete"])->middleware("auth");

Route::get("/dashboard/new-synopsis", [DashboardController::class, "newSynopsis"])->middleware("auth");
Route::post("/dashboard/new-synopsis", [SynopsisController::class, "create"])->middleware("auth");
Route::get("/dashboard/edit-synopsis", [DashboardController::class, "editSynopsis"])->middleware("auth");
Route::post("/dashboard/edit-synopsis", [SynopsisController::class, "update"])->middleware("auth");
Route::get("/dashboard/delete-synopsis", [SynopsisController::class, "delete"])->middleware("auth");

Route::get("/dashboard/upload-photos", [DashboardController::class, "uploadPhotos"])->middleware("auth");
Route::post("/dashboard/upload-photos", [PhotoController::class, "create"])->middleware("auth");
Route::get("/dashboard/delete-photo", [PhotoController::class, "delete"])->middleware("auth");

Route::get("/dashboard/new-user", [DashboardController::class, "newUser"])->middleware("auth");
Route::post("/dashboard/new-user", [UserController::class, "create"])->middleware("auth");
Route::get("/dashboard/edit-password", [DashboardController::class, "editPassword"])->middleware("auth");
Route::post("/dashboard/edit-password", [UserController::class, "password"])->middleware("auth");
Route::get("/dashboard/delete-user", [UserController::class, "delete"])->middleware("auth");

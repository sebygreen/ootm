<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SynopsisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "home"]);
Route::get("/calendar", [PageController::class, "calendar"]);
Route::get("/synopses", [PageController::class, "synopses"]);
Route::get("/about", function () {
    return view("about");
});

Route::get("/login", function () {
    return view("auth.login");
})->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::get("/dashboard", [DashboardController::class, "dashboard"])->middleware("auth");

Route::get("/logout", [AuthController::class, "logout"])->middleware("auth");

Route::get("/new-event", [DashboardController::class, "newEvent"])->middleware("auth");
Route::post("/new-event", [EventController::class, "create"])->middleware("auth");

Route::get("/edit-event", [DashboardController::class, "editEvent"])->middleware("auth");
Route::post("/edit-event", [EventController::class, "update"])->middleware("auth");

Route::get("/new-synopsis", [DashboardController::class, "newSynopsis"])->middleware("auth");
Route::post("/new-synopsis", [SynopsisController::class, "create"])->middleware("auth");

Route::get("/edit-synopsis", [DashboardController::class, "editSynopsis"])->middleware("auth");
Route::post("/edit-synopsis", [SynopsisController::class, "update"])->middleware("auth");

Route::get("/new-photo", [DashboardController::class, "newPhoto"])->middleware("auth");
Route::post("/new-photo", [PhotoController::class, "create"])->middleware("auth");

Route::get("/delete-photo", [PhotoController::class, "delete"])->middleware("auth");

Route::get("/new-user", [DashboardController::class, "newUser"])->middleware("auth");
Route::post("/new-user", [UserController::class, "create"])->middleware("auth");

Route::get("/delete-user", [UserController::class, "delete"])->middleware("auth");

Route::get("/edit-password", [DashboardController::class, "editPassword"])->middleware("auth");
Route::post("/edit-password", [UserController::class, "password"])->middleware("auth");

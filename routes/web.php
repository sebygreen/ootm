<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SynopsisController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MainController::class, "home"]);
Route::get("/calendar", [MainController::class, "calendar"]);
Route::get("/synopses", [MainController::class, "synopses"]);
Route::get("/about", [MainController::class, "about"]);

Route::get("/login", [OfficeController::class, "login"])->name("login");
Route::get("/password/forgot", [OfficeController::class, "forgotPassword"])
    ->middleware("guest")
    ->name("password.request");
Route::get("/password/reset", [OfficeController::class, "resetPassword"])
    ->middleware("guest")
    ->name("password.reset");
Route::get("/logout", [AuthController::class, "logout"])->middleware("auth");
Route::get("/office", [OfficeController::class, "home"])->middleware("auth");

Route::get("/office/events", [OfficeController::class, "events"])->middleware("auth");
Route::get("/office/events/new", [OfficeController::class, "newEvent"])->middleware("auth");
Route::get("/office/events/edit", [OfficeController::class, "editEvent"])->middleware("auth");
Route::get("/office/events/delete", [EventController::class, "delete"])->middleware("auth");

Route::get("/office/synopses", [OfficeController::class, "synopses"])->middleware("auth");
Route::get("/office/synopses/new", [OfficeController::class, "newSynopsis"])->middleware("auth");
Route::get("/office/synopses/edit", [OfficeController::class, "editSynopsis"])->middleware("auth");
Route::get("/office/synopses/delete", [SynopsisController::class, "delete"])->middleware("auth");

Route::get("/office/photos", [OfficeController::class, "photos"])->middleware("auth");
Route::get("/office/photos/new", [OfficeController::class, "newPhotos"])->middleware("auth");
Route::get("/office/photos/delete", [PhotoController::class, "delete"])->middleware("auth");

Route::get("/office/users", [OfficeController::class, "users"])->middleware("auth");
Route::get("/office/users/new", [OfficeController::class, "newUser"])->middleware("auth");
Route::get("/office/users/edit", [OfficeController::class, "editUser"])->middleware("auth");
Route::get("/office/users/delete", [UserController::class, "delete"])->middleware("auth");

Route::get("/office/testimonials", [OfficeController::class, "testimonials"])->middleware("auth");
Route::get("/office/testimonials/new", [OfficeController::class, "newTestimonial"])->middleware("auth");
Route::get("/office/testimonials/edit", [OfficeController::class, "editTestimonial"])->middleware("auth");
Route::get("/office/testimonials/delete", [TestimonialController::class, "delete"])->middleware("auth");

Route::post("/login", [AuthController::class, "login"]);
Route::post("/password/forgot", [AuthController::class, "forgotPassword"])
    ->middleware("guest")
    ->name("password.email");
Route::post("/password/reset", [AuthController::class, "resetPassword"])
    ->middleware("guest")
    ->name("password.update");
Route::post("/office/events/new", [EventController::class, "create"])->middleware("auth");
Route::post("/office/events/edit", [EventController::class, "update"])->middleware("auth");
Route::post("/office/synopses/new", [SynopsisController::class, "create"])->middleware("auth");
Route::post("/office/synopses/edit", [SynopsisController::class, "update"])->middleware("auth");
Route::post("/office/photos/new", [PhotoController::class, "create"])->middleware("auth");
Route::post("/office/users/new", [UserController::class, "create"])->middleware("auth");
Route::post("/office/users/edit", [UserController::class, "update"])->middleware("auth");
Route::post("/office/testimonials/new", [TestimonialController::class, "create"])->middleware("auth");
Route::post("/office/testimonials/edit", [TestimonialController::class, "update"])->middleware("auth");

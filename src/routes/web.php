<?php

use App\Http\Controllers\AccountController;
// use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedroomsController;
use App\Http\Controllers\ConfigurationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AuthController::class, "login"])->name("login");

Route::group(["prefix" => "dashboard", "as" => "dashboard."], function () {
    Route::get("/", [DashboardController::class, "index"])->name("index");

    Route::group(["prefix" => "usuarios", "as" => "users."], function () {
        Route::get("/", [UsersController::class, "index"])->name("index");
    });

    Route::group(["prefix" => "hospedes", "as" => "guests."], function () {
        Route::get("/", [GuestsController::class, "index"])->name("index");
    });

    Route::group(["prefix" => "reservas", "as" => "reservations."], function () {
        Route::get("/", [ReservationController::class, "index"])->name("index");
    });

    Route::group(["prefix" => "quartos", "as" => "bedrooms."], function () {
        Route::get("/", [BedroomsController::class, "index"])->name("index");

        Route::group(["prefix" => "servicos", "as" => "services."], function () {
            Route::get("/", [ServicesController::class, "index"])->name("index");
        });
    });

    Route::group(["prefix" => "financeiro", "as" => "finance."], function () {
        Route::get("/movimentações", [MovementController::class, "index"])->name("movement");

        Route::get("/contas", [AccountController::class, "index"])->name("account");
    });

    Route::group(["prefix" => "estoque", "as" => "storage."], function () {
        Route::get("/", [StorageController::class, "index"])->name("index");
    });

    Route::group(["prefix" => "venda", "as" => "sale."], function () {
        Route::get("/", [SellController::class, "index"])->name("index");
    });

    Route::group(["prefix" => "configuracoes", "as" => "settings."], function () {
        Route::get("/", [ConfigurationsController::class, "index"])->name("index");
    });
});

Route::namespace("Api")->group(function () {
    Route::group(["prefix" => "api", "as" => "api."], function () {
        Route::group(["prefix" => "auth"], function () {
            Route::post("/login", [AuthController::class, "authenticate"]);
            Route::get("/logout", [AuthController::class, "logout"]);
        });
    });
});

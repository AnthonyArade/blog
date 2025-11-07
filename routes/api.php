<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Api\ArticleController;


//4|HksDfwH0LXwJy3vmHOnJMmULXEF8QAr9m6iwBBd39c55c6d0
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('articles', ArticleController::class);
});

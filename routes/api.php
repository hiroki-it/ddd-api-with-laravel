<?php

declare(strict_types=1);

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\User\UserController;

Route::group(['prefix' => 'users'], (function () {
    Route::post('/', [UserController::class, 'createUser']);
    Route::put('/{id}', [UserController::class, 'updateUser']);
    Route::delete('/{id}', [UserController::class, 'deleteUser']);
}));

Route::group(['prefix' => 'articles'], (function () {
    Route::get('/{id}', [ArticleController::class, 'getArticle']);
    Route::get('/', [ArticleController::class, 'getAllArticles']);
    Route::post('/', [ArticleController::class, 'createArticle']);
    Route::put('/{id}', [ArticleController::class, 'updateArticle']);
    Route::delete('/{id}', [ArticleController::class, 'deleteArticle']);
}));

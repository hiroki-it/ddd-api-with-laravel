<?php

declare(strict_types=1);

/**
 * 認証前
 */
Route::group(['namespace' => 'Auth'], (function () {
    Route::get('/register', 'RegisteredUserController@create');
    Route::post('/register', 'RegisteredUserController@store');
    Route::get('/login', 'AuthenticatedSessionController@create');
    Route::post('/login', 'AuthenticatedSessionController@store');
}));

/**
 * 認証後
 */
Route::group(['middleware' => 'auth'], (function () {

    /**
     * 記事
     */
    Route::group(['namespace' => 'Article'], (function () {
        Route::get('/articles', 'ArticleController@showArticleList');
        Route::get('/articles/{id}/detail/', 'ArticleController@showArticleDetail')->middleware('article.id.converter');
        Route::get('/articles/{id}/edited/', 'ArticleController@showEditedArticle')->middleware('article.id.converter');
        Route::post('/articles', 'ArticleController@createArticle');
        Route::put('/articles/{id}', 'ArticleController@updateArticle')->middleware('article.id.converter');
        Route::delete('/articles/{id}', 'ArticleController@deleteArticle')->middleware('article.id.converter');
    }));
}));

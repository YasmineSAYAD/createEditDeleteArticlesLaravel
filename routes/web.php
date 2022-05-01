<?php

use Illuminate\Support\Facades\Route;

//get "articles" page
Route::get('/',[App\Http\Controllers\ArticleController::class,
'articles'])->name('articles');

//get "editArticle" page
Route::get('/article/{id}',[App\Http\Controllers\ArticleController::class,
'article'])->name('article');

//create an article
Route::post('/create-article',[App\Http\Controllers\ArticleController::class,
'createArticle'])->name('createarticle');

//edit an article
Route::post('/edit-article/{id}',[App\Http\Controllers\ArticleController::class,
'editArticle'])->name('editarticle');

//delete an article
Route::post('/delete-article/{id}',[App\Http\Controllers\ArticleController::class,
'deleteArticle'])->name('deletearticle');




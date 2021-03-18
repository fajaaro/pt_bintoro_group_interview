<?php 

use App\Http\Controllers\Backend\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'articles'], function() {
	Route::get('/', [ArticleController::class, 'index'])->name('backend.articles.index');
	Route::get('/create', [ArticleController::class, 'create'])->name('backend.articles.create');
	Route::post('/', [ArticleController::class, 'store'])->name('backend.articles.store');
	Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('backend.articles.destroy');
	Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('backend.articles.edit');
	Route::put('/{id}', [ArticleController::class, 'update'])->name('backend.articles.update');
});
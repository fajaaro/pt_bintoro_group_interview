<?php 

use App\Http\Controllers\Frontend\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'articles'], function() {
	Route::get('/{id}', [ArticleController::class, 'show'])->name('frontend.articles.show');
});
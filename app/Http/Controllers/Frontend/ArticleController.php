<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id)
    {
    	$article = Article::with('user')->where('id', $id)->first();

    	return view('frontend.articles.show', compact('article'));
    }
}

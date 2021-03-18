<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrUpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	public function index()
    {
    	$articles = Article::with('user')->get();

        return view('backend.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('backend.articles.create');
    }

    public function store(StoreOrUpdateArticleRequest $request)
    {
        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('backend.articles.index')->with('success', 'Berhasil membuat artikel baru!');
    }

    public function edit($id)
    {
        $article = Article::find($id);
    	
    	if (!$this->validateStaff($article)) {
    		return redirect()->route('backend.articles.index')->with('failed', 'Unauthorized.');
    	}

        return view('backend.articles.edit', compact('article'));
    }

    public function update(StoreOrUpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);

    	if (!$this->validateStaff($article)) {
    		return redirect()->route('backend.articles.index')->with('failed', 'Unauthorized.');
    	}

        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('backend.articles.index')->with('success', 'Berhasil memperbarui artikel!');            
    }

    public function destroy($id)
    {
        $article = Article::find($id);
    	
    	if (!$this->validateStaff($article)) {
    		return redirect()->route('backend.articles.index')->with('failed', 'Unauthorized.');
    	}

    	$article->delete();

        return redirect()->route('backend.articles.index')->with('success', 'Berhasil menghapus artikel dengan ID ' . $id . '!');
    }

    private function validateStaff($article)
    {
    	$user = Auth::user();

    	if ($user->inRole('staff') && $article->user_id != $user->id) {
    		return false;
    	}    	

    	return true;
    }
}

@extends('layouts.app')

@section('content')
    <section>
    	<div class="container">
	    	<h2>Articles</p>
	    	@forelse($articles as $article)
	    		<div class="card mt-3">
				  	<div class="card-body">
					    <h5 class="card-title">{{ $article->title }}</h5>
					    <p style="font-size: 16px;">{{ substr($article->content, 0, 50) }}{{ strlen($article->content) > 50 ? '...' : '' }}</p>
					    <a href="{{ route('frontend.articles.show', ['id' => $article->id]) }}" class="btn btn-primary">Read More</a>
				  	</div>
				</div>
	    	@empty
	    		<p>No articles.</p>
	    	@endforelse
    	</div>
    </section>
@endsection

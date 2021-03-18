@extends('layouts.app')

@section('content')
    <section>
    	<div class="container">
    		<h2>{{ $article->title }}</h2>
    		<p>{{ $article->content }}</p>
    		<hr>
    		<p>Posted By <b>{{ $article->user->name }}</b> at <b>{{ formatDate($article->created_at) }}</b></p>
    	</div>
    </section>
@endsection

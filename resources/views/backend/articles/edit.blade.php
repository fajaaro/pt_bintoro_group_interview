@extends('backend.layouts.app')

@section('content')
	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Edit Article</div>

                <div class="card-body">
                    <form action="{{ route('backend.articles.update', ['id' => $article->id]) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col">
                                <label for="title">Title</label>
                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" placeholder="Input article title..." value="{{ old('title', $article->title) }}">
                                <span class="red"><strong>{{ $errors->first('title') }}</strong></span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Input article content...">{{ $article->content }}</textarea>
                                <span class="red"><strong>{{ $errors->first('content') }}</strong></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

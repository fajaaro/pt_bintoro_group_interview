@extends('backend.layouts.app')

@section('content')
	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Create New Article</div>

                <div class="card-body">
                	<form action="{{ route('backend.articles.store') }}" method="post">
                		@csrf

                		<div class="row">
                			<div class="col">
                				<label for="title"><span class="red">*</span> Title</label>
                				<input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" placeholder="Input article title..." value="{{ old('title') }}">
                				<span class="red"><strong>{{ $errors->first('title') }}</strong></span>
                			</div>
                		</div>

                		<div class="row mt-2">
                			<div class="col">
                				<label for="content"><span class="red">*</span> Content</label>
                				<textarea name="content" id="content" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Input article content..." value="{{ old('title') }}"></textarea>
                				<span class="red"><strong>{{ $errors->first('content') }}</strong></span>
                			</div>
                		</div>

				        <div class="row mt-3">
				        	<div class="col">
				        		<button type="submit" class="btn btn-primary">Add</button>
				        	</div>
				        </div>
				    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

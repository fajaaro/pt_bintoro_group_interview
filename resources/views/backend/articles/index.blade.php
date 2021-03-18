@extends('backend.layouts.app')

@section('content')

	@include('flash')

	<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Articles</div>

                <div class="card-body">
                    <table class="table mb-2" id="articles-table">
                        <thead>
                            <tr>
                                <th scope="col" width="10">#</th>
                                <th scope="col">Author</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Posted At</th>
                                <th scope="col">Actions</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($articles as $article)
                                <tr>
                                    <th scope="row" width="10">{{ $loop->iteration }}</th>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->content }}</td>
                                    <td>{{ formatDate($article->created_at) }}</td>
                                    <td>
                                        @if (Auth::user()->inRole('staff') && $article->user_id != Auth::id())
                                        @else
                                            <a href="{{ route('backend.articles.edit', ['id' => $article->id]) }}">
                                                <span class="badge badge-warning badge-action" data-toggle="tooltip" data-placement="bottom" title="Edit Article">
                                                    <i class="fas fa-edit"></i>
                                                </span>                                            
                                            </a>

                                            <span class="badge badge-danger badge-action remove-article" data-toggle="tooltip" data-placement="top" title="Remove Article"> 
                                                <i class="far fa-trash-alt"></i>
                                            </span>

                                            <form action="{{ route('backend.articles.destroy', ['id' => $article->id]) }}" class="d-none" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>                                                                            
                                        @endif
                                    </td>
                                </tr>
                        	@endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('backend.articles.create') }}">
	                    <button type="button" class="btn btn-primary btn-sm">Add New Article</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#articles-table').DataTable()

            $('#articles-table').on('click', '.remove-article', function() {
                $(this).next().submit()
            })
        })
    </script>

    <script src="{{ asset('js/my-datatables.js') }}"></script>
@endpush
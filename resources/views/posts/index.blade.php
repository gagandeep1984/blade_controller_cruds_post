@extends('layout')

@section('title')
Listing
@endsection

@section('content')
<div class="container mt-5">
        <div class="row">
                @foreach ($posts as $post)
                <div class="col-sm">
                        <div class="card">
                                <div class="card-header">
                                        <h5 class="card-title" style="text-overflow:ellipsis; overflow:hidden; white-space: nowrap;">{{ $post->title }}</h5>
                                        <!-- <h5 class="card-title">Post_Title</h5> -->
                                </div>
                                <div class="card-body">
                                        <p class="card-text" style="max-height: 5rem; overflow: hidden; text-align: justify;">{{ $post->description }}</p>
                                        <!-- <p class="card-text">Post_Body</p> -->
                                </div>
                                <div class="card-footer">
                                        <div class="row">
                                                <div class="col-sm">
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                                <div class="col-sm">
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                @endforeach

                @if(!$posts->count())
                <div>No Posts Found</div>
                @endif

        </div>
</div>
@endsection
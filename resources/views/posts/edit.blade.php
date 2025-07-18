@extends('layout')

@section('title')
Edit Post
@endsection

@section('content')
<div class="container h-100 mt-5">

        <div class="row h-100 justify-content-center align-items-center">

                <div class="col-10 col-md-8 col-lg-6">

                        <h3>Update Form</h3>


                        <!-- Edit Post  -->
                        <form method="post" action="{{ route('posts.update', $post) }}">
                                @method("PUT")
                                @csrf
                                <div class="form-group">
                                        <label for="title" style="font-weight: 600; color: slategrey">Title</label>
                                        <input class="form-control" style="padding: 15px" type="text" placeholder="Post Title" id="title" name="title" required accesskey="t"
                                                value="{{ $post->title }}" />
                                </div>
                                <br />

                                <div class="form-group">
                                        <label for="description" style="font-weight: 600; color: slategrey">Description</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Post Description"
                                                rows="3" accesskey="h">{{ $post->description }}</textarea>
                                </div>

                                <br />
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                </div>
        </div>
</div>
@endsection
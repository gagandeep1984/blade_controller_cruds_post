@extends('layout')

@section('title')
New Posting
@endsection

@section('content')
<div class="container h-100 mt-5">
        <h3>Add a Post</h3>
        <form action="{{route('posts.store')}}" method="post">
                @csrf
                <!-- Title -->
                <div class="form-group">
                        <label for="title" style="font-weight: 600; color: slategrey">Title</label>
                        <input class="form-control" style="padding: 15px" type="text" placeholder="Post Title" id="title" name="title" required accesskey="t"/>
                </div>
                <br />
                <!-- Description -->
                <div class="form-group">
                        <label for="description" style="font-weight: 600; color: slategrey">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Post Description"
                                rows="3" accesskey="h"></textarea>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Post</button>
                <button type="reset" class="btn btn-primary">Reset</button>
        </form>

</div>
@endsection
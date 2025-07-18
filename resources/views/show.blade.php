@extends('layout')

@section('title')
Single Post
@endsection

@section('content')
<div>
        Post : <h2>{{ $post->title }} </h2>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="px-3">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <h5 class="cart-title">
                {{$post->message}}
            </h5>
            <p class="d-inline card-text">
                投稿者:{{$post->user->name}}
            </p>
            @auth
            @if (Auth::id() === $post->user->id)
            <a href="boards/{{$post->id}}/edit" class="btn btn-primary">編集する</a>
            <form action="boards/{{$post->id}}" method="POST" class="d-inline">
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-danger" value="削除する">
            </form>
            @endif
            @endauth
            <a href="" class="text-reset text-decoration-none"><span class="material-icons">
                    favorite_border</span></a>
        </div>
    </div>
    @endforeach
</div>
@endsection
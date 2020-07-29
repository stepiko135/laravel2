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
            {{-- いいねボタン --}}
            <form action="/like" method="POST">
                @csrf
                @auth
                @endauth
                <input type="hidden" value="{{$post->id}}" name='board_id'>
                <input type="hidden" value="{{Auth::id()}}" name='user_id'>
                <span class="material-icons ">
                    @if(App\Like::where('board_id',$post->id)->where('user_id',Auth::id())->exists())
                    <button type="submit" class="text-reset text-decoration-none">
                        favorite
                    </button>
                    @else
                    <button type="submit" class="text-reset text-decoration-none">
                        favorite_border
                    </button>
                    @endif
                </span>
            </form>
            @endauth
            @guest
            <span class="material-icons ">
                <button class="text-reset text-decoration-none">
                    favorite_border
                </button>
            </span>
            @endguest
            <p class="d-inline">{{count(App\Like::where('board_id',$post->id)->get())}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
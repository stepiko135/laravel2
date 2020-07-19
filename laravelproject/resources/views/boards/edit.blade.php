@extends('layouts.app')

@section('content')

<form action="/boards/{{$post->id}}" method="POST" class="px-3">
    @csrf
    @method("PUT")
    @if ($errors->all()>0)
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <input type="hidden" name="user_id" value="{{Auth::id()}}">
    <div class="form-group">
        <label for="tiile">タイトル</label>
        <input class="form-control" type="text" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="message">コンテンツ</label>
        <textarea class="form-control" name="message" id="message" cols="30" rows="10">{{$post->message}}</textarea>
    </div>
    <input class="btn btn-success" type="submit" value="編集完了">
</form>

@endsection
@extends('layouts.app')

@section('content')

<form action="/boards" method="POST" class="px-3">
    @csrf
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
        <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="message">コンテンツ</label>
        <textarea class="form-control" name="message" id="message" cols="30" rows="10">{{old('message')}}</textarea>
    </div>
    <input class="btn btn-success" type="submit" value="新規投稿">
</form>

@endsection
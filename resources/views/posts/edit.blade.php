@extends('layout')

@section('content')
<div class="container pt-5 mt-5">
    <div class="border p-4">
        <h1 class="h5 mb-4">
            投稿の編集
        </h1>

        <form method="POST" action="{{route('posts.update',['post' => $post])}}">
            @csrf
            @method('PUT')
            <div><input type="hidden" value="{{$bookstore_id}}" name="bookstore_id">
                <input type="hidden" value="{{$user_id}}" name="user_id"></div>
            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input name="title" type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title') ?: $post->title}}">
                    @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" id="body" rows="4" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}">{{old('body') ?: $post->body}}</textarea>
                    @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{$errors->first('body')}}
                    </div>
                    @endif
                </div>
                <div class="mt-5">
                    <a href="{{route('posts.show',['post' => $post])}}" class="btn btn-secondary">キャンセル</a>
                    <button class="btn btn-primary" type="submit">更新する</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
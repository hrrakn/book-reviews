@extends('layout')

@section('content')
<div class="container pt-5 mt-5">
    <div class="border p-4">
        <h1 class="h5 mb-4">
            投稿の新規作成
        </h1>

        <form method="POST" action="{{route('posts.store')}}">
            @csrf

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="title">
                        タイトル
                    </label>
                    <input type="text" id="title" name="title" class="form-control {{$errors->has('title')?'is-invalid':''}}" value="{{old('title')}}">
                    @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{$errors->first('title')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" id="body" rows="4" class="form-control {{$errors->has('body') ? 'is-invalid':''}}">
                    {{old('body')}}
                    </textarea>
                    @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{$errors->first('body')}}
                    </div>
                    @endif
                </div>
                <div class="mt-5">
                    <a href="{{route('top')}}" class="btn btn-secondary">キャンセル
                    </a>
                    <button class="btn btn-primary" type="submit">投稿する</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
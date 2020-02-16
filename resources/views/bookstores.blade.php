@extends('layout')

@section('content')

<div class="container pt-5 mt-5">
    <div class="level text-center mb-4">
        <p class="level-item subtitle is-4 is-text">
            {{ $bookstore->name }}
        </p>
    </div>
    <div class="columns is-mobile mb-3">
        <div class="column is-half">
            <figure class="image">
                <img src="{{ $bookstore->img }}" alt="img">
            </figure>
        </div>
        <div class="column">
            <div class="mb-4">
                <a href="{{route('posts.create', ['bookstore_id' => $bookstore->id])}}" class="btn btn-primary">投稿を新規作成する</a>
            </div>
            @foreach ($posts as $post)
            @if($post->bookstore_id === $bookstore->id)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(Str::limit($post->body, 200))) !!}
                    </p>
                    <a href="{{route('posts.show', ['post' => $post])}}" class="card-link">続きを読む</a>
                </div>
                <div class="card-footer">
                    <span class="mr-4">
                        {{$bookstore->name}}
                    </span>
                    <span class="mr-4">
                        投稿者:{{$authUser->name}}
                    </span>
                    <span class="mr-4">
                        投稿日時: {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                    <span class="badge badge-primary">
                        コメント {{ $post->comments->count() }}件
                    </span>
                    @endif
                </div>
            </div>
            @endif
            @endforeach
            <div class="d-flex justify-content-center mb-5">
                {{$posts->links()}}
            </div>
        </div>
    </div>

</div>
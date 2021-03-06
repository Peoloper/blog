@extends('layouts.frontend')
@section('content')
    <header class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="text-center">
                            <h1 class="mb-4 wrapText">{{$post->title}}</a></h1>
                            <span class="post-category text-white bg-info mb-3">{{$post->category->name}}</span>
                            <div class="post-meta align-items-center text-center">
                                <figure class="avatar mt-4 d-inline-block">
                                    <img src="{{$post->user->photos->first()->path ?? null}}" alt="Image" class=" avatar img-fluid">
                                </figure>
                                <span class="d-inline-block mt-3 author text-white bg-success mb-3">{{$post->user->name}} </span>
                                <span>&nbsp;-&nbsp;{{$post->created_at->diffForHumans()}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <div class="container mt-4" id="app">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-lg-10 wrapText">
                <div>
                    {!! $post->content !!}
                </div>
                <div class="pt-4">
                    <p>
                        Kategorię: <a href="{{route('categoryPost', ['slug' => $post->category->name])}}">{{$post->category->name}}</a>
                        Tagi:
                        @foreach($post->tags as $tag)
                            <a href="">{{$tag->name}}</a>
                        @endforeach
                    </p>
                </div>
                <div>
                    <comments :postid="{{$post->id}}"/>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-lg-2 text-center">
                    <h3>Kategorie</h3>
                    <ul class="text-center list-inline">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('categoryPost', ['slug' => $category->name])}}"> {{$category->name}}
                                    <span>{{$category->posts_count}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <h3>Tagi</h3>
                <ul class="text-center list-inline">
                        @foreach($tags as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>

            </div>
        </div>
    </div>
@endsection

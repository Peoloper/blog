@extends('layouts.frontend')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>wyswietlic kategorie</span>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4">
                        <div class="group-card">
                            <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                <img  src="{{$post->photos->first()->path ?? null}}" class="img-fluid img-rounded" alt="">
                            </div>
                            <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>
                            <h2 class="card-title">{{Str::limit($post->title, 40)}}</h2>
                            <div class="align-items-center text-left">
                                <figure class="author-figure float-left">
                                    <img src="{{$post->user->photos->first()->path ?? null}}" alt="Image" class=" avatar img-fluid">
                                </figure>
                                <span class="d-inline-block mt-1">By {{$post->user->name}} <a href="#"></a></span>
                                <span>&nbsp;-&nbsp;{{$post->created_at->diffForHumans()}} </span>
                                <p>{{Str::limit($post->content), 100}} </p>
                                <p><a href="{{route('post',  $post->slug)}}">Read More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                </div>
            </div>
        </div>
@endsection

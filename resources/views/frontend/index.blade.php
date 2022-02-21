@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center bg-light">
            @foreach($recentPosts as $post)
                <div class="col-sm-6 col-md-4 d-flex align-items-stretch mt-4">
                    <div class="group-card">
                        <img src="{{$post->photos->first()->path ?? null}}" alt="" class="card-img">
                        <span class="post-category text-white bg-secondary mb-3">{{$post->category->name ?? null}}</span>
                        <h2 class="wrapText">{{Str::limit($post->title, 20)}}</h2>
                        <div class="align-items-center text-left">
                            <figure class="author-figure float-left">
                                <img src="{{$post->user->photos->first()->path ?? null}}" alt="Image" class=" avatar img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By {{$post->user->name}} <a href="#"></a></span>
                            <span>&nbsp;-&nbsp;{{$post->created_at->diffForHumans()}} </span>
                            <p class="wrapText">{{Str::limit(strip_tags($post->content, 100))}} </p>
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

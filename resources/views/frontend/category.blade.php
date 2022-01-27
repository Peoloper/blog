@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-sm-6 col-md-4 ">
                    <a href="{{route('categoryPost', ['slug' => $category->name])}}">
                        <div>
                            <img  src="{{$category->photos->first()->path ?? null}}" class="img-fluid" alt="">
                        </div>
                    </a>
                    <span class="post-category text-white bg-secondary mb-3">{{$category->name}}</span>
                    <h2><a href=""></a></h2>
                    <p>{{Str::limit($category->content, 100)}}</p>
                </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                </div>
            </div>
        </div>
@endsection

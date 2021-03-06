@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item"><a href="">Post</a></li>
                        <li class="breadcrumb-item active">Zobacz post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Post - {{$post->title}}</h3>
                                <a href="{{route('admin.post.index')}}" class="btn btn-primary">Powrót</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-pimary">
                                <tbody>
                                <tr>
                                    <th style="width: 200px">Image</th>
                                    <td>

                                        <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                            <img src="{{$post->photos->first()->path ?? null}}" class="img-fluid" alt="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Tytuł</th>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Kategoria</th>
                                    <td>{{$post->category->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Tagi</th>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Autor</th>
                                    <td>{{$post->user->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Opis</th>
                                    <td> {!! $post->content !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

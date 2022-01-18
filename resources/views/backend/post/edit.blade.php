@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Post list</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
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
                                <h3 class="card-title">Edit Post - </h3>
                                <a href="" class="btn btn-primary">Go Back to Post List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <form action="{{route('admin.post.update',['post' => $post])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="title">Post title</label>
                                                <input type="name" name="title" value="{{$post->title}}" class="form-control" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Post Category</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="{{$post->category->id}}" style="display: none" selected>{{$post->category->name}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="image">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input" id="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <div style="max-width: 200px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                            <img src="" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Post Tags</label>
                                                <div class=" d-flex flex-wrap">
                                                    @foreach($tags as $tag)
                                                        <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}"
                                                            @foreach($post->tags as $tagChecked)
                                                                @if ($tag->id == $tagChecked->id)
                                                                    checked
                                                                @endif
                                                            @endforeach
                                                            >
                                                            <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="content" id="content" rows="4" class="form-control"
                                                          placeholder="Enter description">{{$post->content}}</textarea>
                                            </div>
                                            @can('edit all posts')
                                            <div class="form-group">
                                                <label>Published
                                                    <input type="hidden" name="is_published" value="0"/>
                                                    <input type="checkbox" name="is_published"  value="1" {{($post->is_published == 1 ? ' checked' : '')}}
                                                </label>
                                            </div>
                                            @endcan
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


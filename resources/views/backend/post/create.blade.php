@extends('layouts.backend')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Post list</a></li>
                        <li class="breadcrumb-item active">Create Post</li>
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
                                <h3 class="card-title">Create Post</h3>
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
                                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Post title</label>
                                                <input type="title" name="title" value="" class="form-control" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Post Category</label>

                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="" style="display: none" selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Post Tags</label>
                                                <div class=" d-flex flex-wrap">
                                                    @foreach($tags as $tag)
                                                        <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}">
                                                            <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="content" id="content" rows="4" class="form-control"
                                                          placeholder="Enter content"></textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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
@endsection

@extends('layouts.backend')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Strona główna</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{$user->photos->first()->path ?? asset('images/post.png')}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        @foreach($user->roles as $user_role)
                            <p class="text-muted text-center">{{$user_role->name}}</p>
                        @endforeach
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Wszystkie Posty</b> <a class="float-right">{{$posts}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Opublikowane Posty</b> <a class="float-right">{{$isPublished}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('admin.profile.update', ['profile' => $user])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nazwa użytkownika</label>
                                            <input type="name" name="name" class="form-control" id="name" placeholder="Podaj nazwę" value="{{ $user->name }} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Podaj email" value="{{ $user->email }} ">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Hasło</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Podaj hasło">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Zdjęcie profilowe</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label" for="image">Wybierz zdjęcie</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary float-right">Zaaktualizuj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection

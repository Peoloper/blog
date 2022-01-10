@extends('layouts.backend')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
@endsection

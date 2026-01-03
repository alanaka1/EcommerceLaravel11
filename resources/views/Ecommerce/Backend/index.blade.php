@extends('Ecommerce.Backend.layout.app')
 
@section('title', 'Dashboard Bootstrap LTR RTL')

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>

    @include('Ecommerce.Backend.Dashboard.card')

    @include('Ecommerce.Backend.Dashboard.charts')

    @include('Ecommerce.Backend.Dashboard.datatable')


@endsection
 
@section('javascript')

@endsection
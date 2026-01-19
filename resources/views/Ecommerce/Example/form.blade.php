@extends('Ecommerce.Backend.layout.app')
 
@section('title', 'Prodect Form')

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.prodect.index') }}">Prodect</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form</li>
            </ol>
        </nav>
    </div>

    <div class="data-table container">
        <div class="addPost m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm" title="Back"><i class="fa-solid fa-angles-left"></i></a>
        </div>

        <!-- <form action="" method="post"> -->
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category: <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" name="category_id" aria-label="Default select example">
                            <option selected>Category Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="name" value="" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="old_price" class="form-label">Old Price: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="old_price" value="" id="old_price" placeholder="Old Price">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="new_price" class="form-label">New Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="new_price" value="" id="new_price" placeholder="New Price">
                    </div>
                </div>
    
                <div class="col">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" name="" value="" id="formFileSm" type="file">
                    </div>
                </div>
    
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm">Save</button>
        <!-- </form> -->

    </div>


@endsection
 
@section('javascript')

@endsection
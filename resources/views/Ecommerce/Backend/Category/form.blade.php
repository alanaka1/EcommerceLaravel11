@extends('Ecommerce.Backend.layout.app')
 
@section('title')
Category {{ isset($category) ? 'Update Form' : 'Create Form' }}
@endsection

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category {{ isset($category) ? 'Update Form' : 'Create Form' }}</li>
            </ol>
        </nav>
    </div>

    <div class="addPost m-3">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm" title="Back"><i class="fa-solid fa-angles-left"></i></a>
    </div>

    <!-- <form action="" method="post"> -->

        <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
        @isset($category)
            <input type="hidden" id="id" value="{{ $category->id }}">
        @endisset

            <div class="col">
                <div class="card border-0">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}" id="name" placeholder="Category Name">
                </div>
            </div>
            
            <div class="col">
                <div class="card border-0">
                    <label for="order" class="form-label">Category Order</label>
                    <input type="text" class="form-control" name="order" value="{{ isset($category) ? $category->order : '' }}" id="order" placeholder="Category Order">
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <button type="button" id="newCategory" class="btn btn-outline-primary">Category {{ isset($category) ? 'Update' : 'Create' }}</button>
        </div>

    <!-- </form> -->


@endsection
 
@section('javascript')



@isset($category)
    
    <script>
        $(document).ready(function(){
            
            $('#newCategory').click(function(e){

                e.preventDefault();
                let name    = $('#name').val();
                let order   = $('#order').val();
                let id      = $('#id').val();

                if (name == '') {
                
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please Write Category Name',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                } else {

                    $.ajax({

                        method: 'post',
                        url: "{{ route('admin.category.update') }}",
                        data: {
                            name: name,
                            order: order,
                            id: id,
                        },

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            // if (response.data == 0) {
                            
                            //     Swal.fire({
                            //         title: 'Error!',
                            //         text: 'This Category Already Exists',
                            //         icon: 'error',
                            //         confirmButtonText: 'OK'
                            //     });

                            // } else

                             if (response.data == 1) {

                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Category Updated Success',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {

                                        if (result.isConfirmed) {
                                            
                                            // window.location.reload();
                                            window.location.href = "{{ route('admin.category.index') }}";

                                        }

                                })

                            }
                            console.log(response)
                        }

                    })

                }
                // console.log('good');
            });
        });
    </script>

@else

    <script>
        $(document).ready(function(){
            
            $('#newCategory').click(function(e){

                e.preventDefault();
                let name = $('#name').val();
                let order = $('#order').val();

                if (name == '') {
                
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please Write Category Name',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                } else {

                    $.ajax({

                        method: 'post',
                        url: "{{ route('admin.category.store') }}",
                        data: {
                            name: name,
                            order: order,
                        },

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name= "csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            if (response.data == 0) {
                            
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'This Category Already Exists',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });

                            } else {

                                Swal.fire({
                                    title: 'Success',
                                    text: 'Category Added Success',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {

                                    if (result.isConfirmed) {
                                        
                                        // window.location.reload();
                                        window.location.href = "{{ route('admin.category.index') }}";

                                    }

                                })

                            }
                            // console.log(response)
                        }

                    })

                }
                // console.log('good');
            });
        });
    </script>


@endisset


@endsection
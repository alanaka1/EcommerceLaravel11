@extends('Ecommerce.Backend.layout.app')
 
@section('title', 'Category Form')

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>

    <div class="addPost m-3">
        <a href="{{ route('admin.category.create') }}" class="btn btn-outline-primary btn-sm" title="Add"><i class="fa-solid fa-circle-plus"></i></a>
    </div>

    <form action="" method="post">

        <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
    
            <div class="col">
                <div class="card border-0">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" value="" id="name" placeholder="Category Name">
                </div>
            </div>
            
            <div class="col">
                <div class="card border-0">
                    <label for="order" class="form-label">Category Order</label>
                    <input type="text" class="form-control" name="order" value="" id="order" placeholder="Category Order">
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <button type="submit" id="newCategory" class="btn btn-outline-primary">Category</button>
        </div>

    </form>


@endsection
 
@section('javascript')

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

            

            }
            // console.log('good');
        });
    });
</script>

@endsection
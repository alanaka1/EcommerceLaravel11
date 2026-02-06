@extends('Ecommerce.Backend.layout.app')
 
@section('title')
Prodect {{ isset($prodect) ? 'Upload' : 'Create' }}
@endsection

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.prodect.index') }}">Prodect</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($prodect) ? 'Upload' : 'Create' }}</li>
            </ol>
        </nav>
    </div>

    <div class="data-table container">
        <div class="addPost m-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm" title="Back"><i class="fa-solid fa-angles-left"></i></a>
        </div>

        <!-- <form action="" method="post"> -->
            <div class="row row-cols-1 row-cols-md-3">
                @isset($prodect)
                    <input type="hidden" id="id" value="{{ $prodect->id }}">
                @endisset
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category: <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" name="category_id" id="category">
                            <option value="">Category Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{ isset($prodect) ? $prodect->name : '' }}" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="old_price" class="form-label">Old Price: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="old_price" value="{{ isset($prodect) ? $prodect->old_price : '' }}" id="old_price" placeholder="Old Price">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="new_price" class="form-label">New Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="new_price" value="{{ isset($prodect) ? $prodect->new_price : '' }}" id="new_price" placeholder="New Price">
                    </div>
                </div>
    
                <div class="col">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" name="img" value="" id="img" type="file">
                    </div>
                </div>
    
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm {{ isset($prodect) ? 'editPro' : 'addPro' }}">{{ isset($prodect) ? 'Upload' : 'Create' }}</button>
        <!-- </form> -->

    </div>


@endsection
 
@section('javascript')

@isset($prodect)

<script>
  $(document).ready(function(e){

        $('.editPro').click(function(e){

            e.preventDefault();
            let category    = $('#category').val();
            let name        = $('#name').val();
            let oldPrice    = $('#old_price').val();
            let newprice    = $('#new_price').val();
            let id          = $('#id').val();
            let formData    = new FormData();
            
            if ($('#img').prop('files')[0] != null) {
                
                let img         = $('#img').prop('files')[0];
                formData.append('img', img);

            }

            formData.append('category_id', category);
            formData.append('name', name);
            formData.append('old_price', oldPrice);
            formData.append('new_price', newprice);
            formData.append('id', id);

            if (category == '') {
                
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Category',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else if (name == '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Name',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else if (newprice == '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Price',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else {
                $.ajax({
                    
                    method: 'post',
                    url: '{{ route("admin.prodect.update") }}',
                    contentType: false,
                    processData: false,
                    data: formData,
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success:function(response) {

                        if (response.data == 1) {
                            
                            Swal.fire({
                                title: 'Success',
                                text: 'Prodect Update Success',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })

                        }

                        window.location.href = "{{ route('admin.prodect.index') }}";


                        console.log(response)
                    }

                })
            }
        });
    });
    </script>


@else

<script> 
    $(document).ready(function(e){

        $('.addPro').click(function(e){

            e.preventDefault();
            let category    = $('#category').val();
            let name        = $('#name').val();
            let oldPrice   = $('#old_price').val();
            let newprice   = $('#new_price').val();
            let img         = $('#img').prop('files')[0];

            let formData = new FormData();
            formData.append('category_id', category);
            formData.append('name', name);
            formData.append('old_price', oldPrice);
            formData.append('new_price', newprice);
            formData.append('img', img);

            if (category == '') {
                
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Category',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else if (name == '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Name',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else if (newprice == '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Select Product Price',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else if (!img) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please Upload Product Image',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else {
                $.ajax({
                    
                    method: 'post',
                    url: '{{ route("admin.prodect.store") }}',
                    contentType: false,
                    processData: false,
                    data: formData,
                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success:function(response) {

                        if (response.data == 1) {
                            
                            Swal.fire({
                                title: 'Success',
                                text: 'Prodect Store Success',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })

                        }

                        window.location.href = "{{ route('admin.prodect.index') }}";


                        console.log(response)
                    }

                })
            }
        });
    });
</script>

@endisset



@endsection
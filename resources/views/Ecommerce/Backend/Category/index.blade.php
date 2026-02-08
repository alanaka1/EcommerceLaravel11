@extends('Ecommerce.Backend.layout.app')
 
@section('title', 'Category')

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>

    <div class="data-table container">
        <div class="addPost m-3">
            <a href="{{ route('admin.category.create') }}" class="btn btn-outline-primary btn-sm" title="Add"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->order }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-outline-danger btn-sm delCate" title="Delete" cateID="{{ $category->id }}"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm" title="Show"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>


@endsection
 
@section('javascript')

<script>
    // $(document).ready(function() {
    //     // التأكد من حذف أي نسخة سابقة قبل التشغيل
    //     if ($.fn.DataTable.isDataTable("#example")) {
    //         $("#example").DataTable().destroy();
    //     }

    //     $("#example").DataTable({
    //         "responsive": true, 
    //         "autoWidth": false,
    //         // يمكنك إضافة أي إعدادات أخرى هنا
    //     });
    // });

    $(document).ready(function(){

        $('.delCate').click(function(e){

            let id = $(this).attr("cateID");

            Swal.fire({
                title: 'Warning',
                text: 'Do You Want To Delete This Category?',
                icon: 'warning',
                confirmButtonText: 'Yes'
            }).then((result) => {

                if (result.isConfirmed) {
                    
                    $.ajax({

                        method: 'post',
                        url:'{{ route("admin.category.delete") }}',
                        data: {
                            id:id
                        },

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },

                        success:function(response){

                        if (response.data == 1) {

                            window.location.reload();
                            
                        }
                             
                            console.log(response);

                        }
                    })

                }

            });

            console.log(id);
        });

    });
</script>

@endsection
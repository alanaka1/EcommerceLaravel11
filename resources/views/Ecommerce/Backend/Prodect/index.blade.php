@extends('Ecommerce.Backend.layout.app')
 
@section('title', 'Prodect')

@section('css')

@endsection
 
@section('content')

    <div class="alert alert-primary p-1 ps-4" role="alert">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prodect</li>
            </ol>
        </nav>
    </div>

    <div class="data-table container">
        <div class="addPost m-3">
            <a href="{{ route('admin.prodect.create') }}" class="btn btn-outline-primary btn-sm" title="Add"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Old Price</th>
                    <th>New Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prudects as $prudect)

                    @php($category = DB::table('categories')->where('id', '=', $prudect ->category)->first())
                <tr>
                    <td>{{ $prudect->id }}</td>
                    <td>{{ $prudect->name }}</td>
                    <td>{{ $prudect->old_price }}</td>
                    <td>{{ $prudect->new_price }}</td>
                    <td><a href="{{ asset($prudect->img) }}" target="_blank"><img src="{{ asset($prudect->img) }}" alt="" width="40"></a></td>

                    <td>
                        <a href="{{ route('admin.prodect.edit', $prudect->id) }}" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-outline-danger btn-sm prudectDelete" title="Delete" proId="{{ $prudect->id }}"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm" title="Show"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Old Price</th>
                    <th>New Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>


@endsection
 
@section('javascript')

<script>

$(document).ready(function(){

    $('.prudectDelete').click(function(){

        let id = $(this).attr('proId');

        Swal.fire({
            title: 'Warning',
            text: 'Are You Sure Want Delete This Product?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    method: 'POST',
                    url: '{{ route("admin.prodect.delete") }}',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        console.log(response);
                        location.reload();
                    }
                });

            }

        });
        // console.log(id);
    });

});
</script>

@endsection
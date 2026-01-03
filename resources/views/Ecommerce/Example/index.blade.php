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

    <div class="data-table container">
        <div class="addPost m-3">
            <a href="#" class="btn btn-outline-primary btn-sm" title="Add"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>
                        <a href="#" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm" title="Show"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table>
    </div>


@endsection
 
@section('javascript')

@endsection
@extends('admin.master')
@section('contant')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-3">Products Listing</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-body">
                <a href="{{ route('admin.products.create') }}">
                    <button class="btn btn-sm btn-primary shadow-sm mb-3" style="float: right">Add New</button>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count=1;
                            @endphp
                            @foreach ($products as $value)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td><img style="width: 100%; height:80px;" src="{{ asset('assets/images/'.$value->image) }}" alt=""></td>
                                    <td>
                                        <a href="{{ url('/edit-user' . '/' . $value->id) }}">
                                            <button class="btn btn-sm btn-success shadow-sm">Edit</button>
                                        </a>
                                        <a href="{{ route('admin.products.delete',['id'=>$value->id]) }}">
                                            <button class="btn btn-sm btn-danger shadow-sm">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

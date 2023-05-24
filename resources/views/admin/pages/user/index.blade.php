@extends('admin.master')
@section('contant')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-3">Users Listing</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <a href="/admin/user/create">
                    <button class="btn btn-sm btn-primary shadow-sm mb-3" style="float: right">Add New</button>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($user as $value)
                            <tbody>
                                <td>{{ $count++ }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->lastname ?? 'NO' }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a href="{{ url('admin/user-edit/' . $value->id) }}"><button
                                            class="btn btn-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/user-delete/' . $value->id) }}"><button
                                            class="btn btn-danger btn-sm">Delete</button></a>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

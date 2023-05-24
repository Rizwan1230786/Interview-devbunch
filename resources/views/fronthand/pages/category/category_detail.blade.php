@extends('fronthand.master')

@section('main')
    <section class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                {{ $category->name }} <br>
                {{ $category->detail }}
            </div>
            <div class="row">
                <p>Brand: {{ $brand->name ?? 'No Any Brand' }} of {{ $category->name }}</p>
            </div>
        </div>
    </section>
@endsection

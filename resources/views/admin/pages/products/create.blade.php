@extends('admin.master')
@section('contant')
    <section id="basic-horizontal-layouts">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card" style="padding: 10px;">
                    <div class="card-header">
                        <?php
                if (isset($editproduct->id) && $editproduct->id != 0) { ?>
                        <h4 class="card-title">Update Product</h4>

                        <?php } else { ?>
                        <h4 class="card-title">
                            Create Product</h4>
                        <?php }
                ?>

                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($editproduct) && $editproduct->id != 0) {
                            $url = url('/admin/productupdate/' . $editproduct->id);
                        } else {
                            $url = url('/admin/create-products');
                        }
                        ?>
                        <form class="form form-horizontal formSubmited" id="jquery-val-form" action="{{ $url }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="star5" name="product_rating" value="1" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-5 offset-1 validationForm">
                                            <label for="">Product Name</label>
                                            <input type="text" class="form-control" id="title" name="name"
                                                value="{{ $editproduct->title ?? '' }}" placeholder="Enter Title" />
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="">Category</label>
                                            @if (isset($editproduct->id) && $editproduct->id != 0)
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="">--Select--</option>
                                                    @foreach ($category as $data)
                                                        <option value="{{ $data->id }}"
                                                            {{ $editproduct->category_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="">--Select--</option>
                                                    @foreach ($category as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-sm-10 offset-1 mt-2">
                                            <label for="">Short Detail</label>
                                            <textarea name="detail" class="form-control" id="" placeholder="Note..."></textarea>
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('detail') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-5 offset-1 mt-2">
                                            <label for="">Product Image</label>
                                            <input type="file" name="image" class="form-control" id="">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-5 mt-2">
                                            <label for="">Product Gallary</label>
                                            <input type="file" name="gallary_iamge[]" multiple class="form-control" id="">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('gallary_iamge') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-10  text-center offset-1 mt-5">
                                        @if (isset($editproduct->id) && !empty($editproduct->id))
                                            <button type="submit"
                                                class="btn btn-success me-1 submit_button">Update</button>
                                            <a href="{{ url('/admin/allproduct/list') }}"><button type="button"
                                                    class="btn btn-warning">Cancel</button></a>
                                        @else
                                            <button type="submit"
                                                class="btn btn-success me-1 submit_button">Submit</button>
                                            <a href="{{ url('/admin/allproduct/list') }}"><button type="button"
                                                    class="btn btn-warning">Cancel</button></a>
                                        @endif
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.master')
@section('contant')
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Add new User</h2>

                                <form action="/admin/user/submit" method="Post">
                                    @csrf
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                        <input type="text" id="form3Example1cg" name="name"
                                            class="form-control form-control-lg" />

                                        @if ($errors->has('name'))
                                            <span class="invalid feedback mt-1"role="alert">
                                                <strong class="text-danger">{{ $errors->first('name') }}.</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Last Name</label>
                                        <input type="text" id="form3Example3cg" name="lastname"
                                            class="form-control form-control-lg" />

                                        @if ($errors->has('lastname'))
                                        <span class="invalid feedback mt-1"role="alert">
                                            <strong class="text-danger">{{ $errors->first('lastname') }}.</strong>
                                        </span>
                                    @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Email</label>
                                        <input type="email" id="form3Example4cg" name="email"
                                            class="form-control form-control-lg" />

                                        @if ($errors->has('email'))
                                            <span class="invalid feedback mt-1"role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}.</strong>
                                            </span>
                                        @endif
                                    </div>
                                     <div class="form-outline mb-4">
                                        <select name="category_id" class="form-control" id="">
                                            <option value="">--Select Category--</option>
                                            @foreach ($category as $value)
                                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg" name="password"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cdg">password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="Calendar" id="form3Example4cg" name="dob"
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Data of Birth</label>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input type="checkbox" class="form-check-input me-2" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info btn-block btn-lg">Submit</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

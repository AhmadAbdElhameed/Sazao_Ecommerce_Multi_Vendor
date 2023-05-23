@extends('admin.layouts.master')

@section('title')
    Profile
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" action="{{route('admin.profile.update')}}" class="needs-validation"
                          novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="mb-3">
                                    <img width="100px" src="{{asset(Auth::user()->image)}}" alt="Profile image">
                                </div>
                                <div class="form-group col-12">
                                    <label>Image</label>
                                    <input  type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input  type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required="">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" required="">
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-7 col-12">--}}
{{--                                    <label>Email</label>--}}
{{--                                    <input type="email" class="form-control" value="ujang@maman.com" required="">--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        Please fill in the email--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-md-5 col-12">--}}
{{--                                    <label>Phone</label>--}}
{{--                                    <input type="tel" class="form-control" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-12">--}}
{{--                                    <label>Bio</label>--}}
{{--                                    <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group mb-0 col-12">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">--}}
{{--                                        <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>--}}
{{--                                        <div class="text-muted form-text">--}}
{{--                                            You will get new information about products, offers and promotions--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

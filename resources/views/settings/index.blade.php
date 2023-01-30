@extends('layouts.app')
@section('header_extends')
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Setting</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top
            col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li> -->
                    <li class="breadcrumb-item active"><a href="#">Setting</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <div class="page-content p-t-0" style="min-height:239px">
            <div class="row">
                <div class="col">
                    <label>name Site</label>
                    <input type="text" class="form-control" name="name_site">
                </div>
                <div class="col">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="phone">
                </div>
            </div>

            <br>

            <div class="row">


                <div class="col">
                    <label>Facebook</label>
                    <input type="url" class="form-control" name="Facebook">
                </div>


                <div class="col">
                    <label>Instagram</label>
                    <input type="url" class="form-control" name="Instagram">
                </div>
            </div>


            <br>


            <div class="row text-center">
                <div class="col">
                    <label>Status Created Orders</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                               value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                               value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            No Active
                        </label>
                    </div>
                </div>

                <div class="col">
                    <label>Status Registers Drivers</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios12"
                               value="option1" checked>
                        <label class="form-check-label" for="exampleRadios12">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios22"
                               value="option2">
                        <label class="form-check-label" for="exampleRadios22">
                            No Active
                        </label>
                    </div>
                </div>


                <div class="col">
                    <label>Status Messages OTP</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios13" id="exampleRadios123"
                               value="option1" checked>
                        <label class="form-check-label" for="exampleRadios123">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios13" id="exampleRadios22"
                               value="option2">
                        <label class="form-check-label" for="exampleRadios223">
                            No Active
                        </label>
                    </div>
                </div>
            </div>


            <br>


            <div class="row">
                <div class="col">
                    <label>Api Payments</label>
                    <input type="text" class="form-control" name="api">
                </div>

                <div class="col">
                    <label>Color Site</label>
                    <input type="color" class="form-control" name="api">
                </div>
            </div>


            <br>


            <div class="row">
                <div class="col">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="5"></textarea>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success">Updated</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_extends')

@endsection

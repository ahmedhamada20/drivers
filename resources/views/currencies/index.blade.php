@extends('layouts.app')
@section('header_extends')


@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">currencies</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top
            col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li> -->
                    <li class="breadcrumb-item active"><a href="#">currencies</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="page-content p-t-0" style="min-height:239px">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                    @endif

                    <div class="portlet box blue-hoki">
                        <!-- <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Registered Users
                            </div>
                            <div class="addbtntable">
                                <a href="" class="btn btn-danger">Export CSV</a>
                            </div>
                        </div> -->
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <p id="sample"></p>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> name </th>
                                        <th> code </th>
                                        <th> price </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Currency::all() as  $value)
                                        <tr>
                                            <td>{{$loop->index+1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->code }}</td>
                                            <td>{{ $value->price }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_extends')

@endsection

@extends('layouts.app')
@section('header_extends')


@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Reports Drivers</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top
            col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li> -->
                    <li class="breadcrumb-item active"><a href="#">Reports Drivers</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <div class="page-content p-t-0" style="min-height:239px">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                    @endif
                    <form action="{{route('search_drivers')}}" method="get">
                        @csrf


                        <div class="row">
                            <div class="col">
                                <label>Drivers</label>
                                <select class="form-control" name="Reports_Drivers" required>
                                    <option value="" disabled selected>-- Choose --</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}"
                                        @isset($getPackageDrivers)
                                            {{$driver->id == $getPackageDrivers->id ? 'selected' : null}}
                                            @endisset
                                        >{{$driver->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            <div class="col">--}}
{{--                                <label>Start Date</label>--}}
{{--                                <input type="date" name="start_data" class="form-control">--}}
{{--                            </div>--}}


{{--                            <div class="col">--}}
{{--                                <label>End Date</label>--}}
{{--                                <input type="date" name="end_data" class="form-control">--}}
{{--                            </div>--}}

                            <div class="col" style="margin-top: 24px;">
                                <button class="btn btn-success btn-block" type="submit"> Search</button>
                            </div>
                        </div>
                    </form>

                    <br>
                    <div class="portlet box blue-hoki">

                        @isset($getPackageDrivers)
                            <div class="portlet-body text-center">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th> No</th>
                                            <th> Name Drivers</th>
                                            <th> Email Drivers</th>
                                            <th> Phone Drivers</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <td>1</td>
                                        <td>{{$getPackageDrivers->fullname ?? 'No Data'}}</td>
                                        <td>{{$getPackageDrivers->email ?? 'No Data'}}</td>
                                        <td>{{$getPackageDrivers->phone ?? 'No Data'}}</td>


                                        </tbody>

                                    </table>

                                </div>

                                <br>
                                <h5>Orders</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th> Package parcel description</th>
{{--                                            <th> Drivers initial status</th>--}}
                                            <th> Drivers approved status</th>
                                            <th> Drivers driver status</th>
                                            <th> Drivers driver collected status</th>
                                            <th> Orders total amount</th>
                                            <th> Orders status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($getPackageDrivers->getOrdersStatus as $orders)
                                            <tr>
                                                <td>{{$loop->index +1 }}</td>
                                                <td>{{$orders->order->package->parcel_description ?? 'No Data'}}</td>
{{--                                                <td>{{$orders->initial_status ?? 'No Data'}}</td>--}}
                                                <td>{{$orders->approved_status ?? 'No Data'}}</td>
                                                <td>{{$orders->driver_status ?? 'No Data'}}</td>
                                                <td>{{$orders->driver_collected_status ?? 'No Data'}}</td>
                                                <td>{{$orders->order->total_amount ?? 'No Data'}} AED</td>
                                                <td>{{$orders->order->status ?? 'No Data'}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7" class="text-center text-danger">Total Orders Delivered
                                                :: {{ number_format($getPackageDrivers->getSumTotal(),2)}} AED
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_extends')

@endsection

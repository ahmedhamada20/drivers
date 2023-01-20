@extends('layouts.app')
@section('header_extends')


@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Reports Orders</h3>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top
            col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                    </li> -->
                    <li class="breadcrumb-item active"><a href="#">Reports Orders</a>
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
                    <form action="{{route('search_Orders')}}" method="get">
                        @csrf


                        <div class="row">


                            <div class="col">
                                <label>Start Date</label>
                                <input type="date" name="start_data" class="form-control" required>
                            </div>


                            <div class="col">
                                <label>End Date</label>
                                <input type="date" name="end_data" class="form-control" required>
                            </div>

                            <div class="col" style="margin-top: 24px;">
                                <button class="btn btn-success btn-block" type="submit"> Search</button>
                            </div>
                        </div>
                    </form>

                    <br>
                    <div class="portlet box blue-hoki">

                        @isset($getOrders)
                            <div class="portlet-body text-center">

                                <br>
                                <h5>Orders</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th> Orders Created User</th>
                                            <th> Orders total amount</th>
                                            <th> Orders status</th>
                                            <th> Orders packages</th>
                                            <th> Orders driver name</th>
                                            <th> Orders driver phone</th>
                                            <th>Orders Date</th>
                                            {{--                                            <th> Orders total amount</th>--}}
                                            {{--                                            <th> Orders status</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($getOrders as $orders)
                                            <tr>
                                                <td>{{$loop->index +1 }}</td>
                                                <td>{{$orders->user->firstname}}</td>
                                                <td>{{$orders->status}}</td>
                                                <td>{{$orders->total_amount}} AED</td>
                                                <td>{{$orders->package->parcel_description}}</td>
                                                @foreach($orders->getInformation as $drivers)
                                                    <td>{{$drivers->driver ? $drivers->driver->fullname : null}}</td>
                                                    <td>{{$drivers->driver ? $drivers->driver->phone : null}}</td>
                                                @endforeach
                                                <td>{{ $orders->created_at->diffForHumans(['parts'=>1,'join'=>', '])}}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="7">Total Amount Orders :: {{number_format($getOrdersSum,2)}}
                                                AED
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>
                                    {!! $getOrders->onEachSide(250)->links() !!}

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

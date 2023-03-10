@extends('layouts.app')
@section('header_extends')


@endsection
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Packages List</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top
            col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <!-- <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                </li> -->
                <li class="breadcrumb-item active"><a href="#">List of Packages</a>
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
                <!-- search box -->
                <div class="form-inline" id="search-box">
                    <label for="search">Search Box : </label>
                    <input style="margin-left: 10px;" type="text" class="form-control" placeholder="Search Packages Here." id="search" name="search"></input>
                </div>
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
                            <div class="registered-users">Total Packages : <span id="totaluser"></span></div>
                            <p id="sample"></p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Order Id </th>
                                        <th> Recipient Name </th>
                                        <th> Recipient Phone </th>
                                        <th> Status </th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data) && count($data) > 0)
                                    {{$i = 0}}
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->order_id }}</td>
                                        <td>{{ $value->package->recipient_name }}</td>
                                        <td>{{ $value->package->recipient_phone }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>
                                            @if($value->status != 'cancel')
                                            <button class="btn btn-primary" style="padding: 5px !important;" data-toggle="modal" data-target="#exampleModal{{$value->id}}"><i class="fa fa-edit"></i> Status </button>
                                            @endif
                                            <a href="{{ route('package.details', ['id' => $value->package->id]) }}" class="btn btn-success" style="padding: 5px !important;"><i class="ft-eye"></i> View</a>

                                            <!-- @if ($value->status == 1)
                                            <a href="{{route('user.status', ['id' => $value->id])}}" class="btn btn-danger" style="padding: 5px !important;"> <i class="ft-x-circle"></i> Disable</a>
                                            @else
                                            <a href="{{route('user.status', ['id' => $value->id])}}" class="btn btn-success" style="padding: 5px !important;"><i class="ft-check-circle"></i> Enable</a>
                                            @endif -->
                                        </td>
                                        @include('Packages.status')
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7">There are no data.</td>
                                    </tr>
                                    @endif

                                </tbody>

                            </table>
                            {!! $data->onEachSide(5)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_extends')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // event.preventDefault();
        // fetch_registered_users();

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });



        function fetch_registered_users(query = '') {
            $.ajax({
                url: "{{route('live_search.package')}}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('tbody').html(data.table_data);
                    $('#sample').text(data.totaluser);
                }
            });
        }

        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_registered_users(query);
        });

    });
</script>
@endsection

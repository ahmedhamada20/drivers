<?php

namespace App\Http\Controllers;

use App\Driver;
use App\DriverActivity;
use App\Order;
use App\Orderstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    // Get All drivers
    public function getdrivers()
    {
        $drivers = Driver::get();

        return view('Reports.getdrivers', compact('drivers'));
    }


    // Get drivers search_drivers

    public function search_drivers(Request $request)
    {
        $drivers = Driver::get();
        $getPackageDrivers = Driver::findorfail($request->Reports_Drivers);

        return view('Reports.getdrivers', compact('getPackageDrivers', 'drivers'));

    }

    public function getorders()
    {
        return view('Reports.getorders');
    }


    public function search_Orders(Request $request)
    {
        $getOrders = Order::whereBetween('created_at', [$request->start_data, $request->end_data])->orderByDesc('id')->simplePaginate(250);
        $getOrdersSum = Order::whereBetween('created_at', [$request->start_data, $request->end_data])->orderByDesc('id')->sum('total_amount');
        return view('Reports.getorders', compact('getOrders', 'getOrdersSum'));
    }

    public function getLocations()
    {

        $locations = DriverActivity::all();
        return view('map.index', ['locations' => $locations]);
    }


    public function getAllLocationsDriver()
    {
        $drivers = DB::table('driver_activity')
            ->select(['lat', 'lng'])->get();
        return $drivers;
    }
}

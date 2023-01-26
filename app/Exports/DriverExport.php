<?php

namespace App\Exports;

use App\Driver;
use App\Orderstatus;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class DriverExport implements FromCollection ,WithMapping, WithHeadings
{

    use Exportable;


    public function __construct(int $driver)
    {
        $this->driver = $driver;
    }

    public function collection()
    {
        return Orderstatus::with(['order'])->where('driver_id',$this->driver)->get();
    }




    public function map($orderStatus) : array
    {
        return [

            $orderStatus->order->package->parcel_description ?? 'No Data',
            $orderStatus->approved_status ?? 'No Data',
            $orderStatus->driver_status ?? 'No Data',
            $orderStatus->driver_collected_status ?? 'No Data',
            $orderStatus->order->total_amount ?? 'No Data' ,
            $orderStatus->order->status ?? 'No Data',

        ];
    }

    public function headings(): array
    {
        return [
            'Package parcel description',
            'Drivers approved status',
            'Drivers driver status',
            'Drivers driver collected status',
            'Orders total amount',
            'Orders status',
        ];
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverActivity extends Model
{
    protected $fillable = [
        'driver_id', 'in_time', 'out_time', 'status', 'total_time', 'lat', 'lng','activity_type'
    ];

    protected $appends  = ['name'];


    public function getNameAttribute()
    {
        return $this->driver != null ? $this->driver->fullname . '  ' . $this->driver->phone : null;
    }

    protected $table = 'driver_activity';

    public function driver()
    {
        return $this->belongsTo(Driver::class,'driver_id');
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'fullname', 'email', 'phone', 'gender', 'dob', 'password', 'status', 'licence_file', 'emorates_id', 'distance', 'address', 'profile', 'company_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('/storage/driver/profile/thumbnail/' . $this->profile);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function toggleStatus()
    {
        $this->status = !$this->status;
        return $this;
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'driver_id', 'id');
    }

    public function getOrdersStatus()
    {
        return $this->hasMany('App\Orderstatus', 'driver_id');
    }

    public function getSumTotal()
    {
        $count = 0;
        foreach ($this->getOrdersStatus as $row){
            $count += $row->order()->where('status','Delivered')->sum('total_amount');
        }
        return $count;
    }
}

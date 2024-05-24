<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serviceList extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'service_id',
        'service_name',
        'service_desc',
        'service_endpoint_esb',
        'service_endpoint_msr',
        'service_postman',
    ];

    public function scopeSearch($query, $value){
        $query->where('service_name','like',"%{$value}%")
        ->orwhere('service_endpoint_esb','like',"%{$value}%")
        ->orwhere('service_endpoint_msr','like',"%{$value}%");

    }


}

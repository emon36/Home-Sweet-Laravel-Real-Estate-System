<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

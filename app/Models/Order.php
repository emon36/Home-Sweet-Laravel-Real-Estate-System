<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }

}

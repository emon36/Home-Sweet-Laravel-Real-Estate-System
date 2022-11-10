<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}

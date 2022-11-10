<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}

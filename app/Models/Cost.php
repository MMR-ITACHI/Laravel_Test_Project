<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $fillable = [

        'unit_id','cost','status'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    
}

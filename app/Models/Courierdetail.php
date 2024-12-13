<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courierdetail extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(Branch::class,'sender_branch_id');
    }

    public function recbranch(){
        return $this->belongsTo(Branch::class,'receiver_branch_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable =[
        'branch_name','branch_email','admin_id','number','address'
        ];


        public function admin(){
            return $this->belongsTo(Admin::class);

        }


        public function manager(){
           // return $this->belongsTo(Manager::class);
           return $this->hasMany(Manager::class);
    }

    public function employee(){
        return $this->hasMany(Employee::class);
    }


    public function courierdetail(){
        return $this->hasMany(Courierdetail::class);
    }

}

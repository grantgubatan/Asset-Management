<?php

namespace App;
use Carbon\Carbon;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable =
    [
      'serial', 'model_name', 'hardware_type', 'vendor', 'brand', 'processor', 'ram', 'graphics', 'storage', 'storage_type', 'purchased_date', 'warranty_date', 'status'
    ];

    protected $dates = ['purchased_date', 'warranty_date'];

    public function owners()
    {
        return $this->hasMany('App\Employee');
    }
}

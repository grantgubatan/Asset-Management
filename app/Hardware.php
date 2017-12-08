<?php

namespace App;
use Carbon\Carbon;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable =
    [
<<<<<<< HEAD
      'serial', 'model_name', 'hardware_type', 'vendor', 'brand', 'processor', 'ram',
       'graphics', 'storage', 'storage_type', 'purchased_date', 'warranty_date', 'status', 'deployed_by',
        'deployed_date', 'disposed_date'

    ];

    protected $dates = ['purchased_date', 'warranty_date', 'deployed_date','disposed_date'];
=======
      'serial', 'model_name', 'hardware_type', 'vendor', 'brand', 'processor', 'ram', 'graphics', 'storage', 'storage_type', 'purchased_date', 'warranty_date', 'status'
    ];

    protected $dates = ['purchased_date', 'warranty_date'];
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f

    public function owners()
    {
        return $this->hasMany('App\Employee');
    }
}

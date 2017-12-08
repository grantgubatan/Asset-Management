<?php

namespace App;
use App\Hardware;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $dates = ['deployed_date'];

  public function hardware()
  {
      return $this->belongsTo('App\Hardware', 'hardware_id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $dates = ['peak_time', 'last_update'];
}

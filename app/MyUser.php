<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    protected $connection = 'sagomensajes';
    protected $table = 'my_user';
}

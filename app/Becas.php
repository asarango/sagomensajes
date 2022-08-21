<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Becas extends Model
{
    protected $connection = 'odoo';
    protected $table = 'info_xrabecas_ws';
}

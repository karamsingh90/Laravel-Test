<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsManagement extends Model
{
    protected $table = 'items_management';

    protected $fillable = array('name', 'price');
}

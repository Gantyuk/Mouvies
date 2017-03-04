<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class director extends Model
{
    protected $fillable = ['S_Name', 'L_Name', 'Y_Birth', 'Y_Death', 'id_contries'];
}

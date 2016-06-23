<?php

namespace DEVAPP;

use Illuminate\Database\Eloquent\Model;

class NewDesigner extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'imagefilepath'

    ];
}

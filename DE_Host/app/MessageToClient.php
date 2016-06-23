<?php

namespace DEVAPP;

use Illuminate\Database\Eloquent\Model;

class MessageToClient extends Model
{
    protected $table = 'message';

    protected $fillable = [

        'designer',
        'user',
        'title',
        'body'
    ];


}

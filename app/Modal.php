<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $fillable = [
        'id',
        'modal_text',
        'modal_title'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}

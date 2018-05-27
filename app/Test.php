<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $table = 'cases';
    protected $fillable = [
        'description',
        'status',
        'user_id',
        'client_id',
    ];
}

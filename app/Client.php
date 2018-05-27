<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'phone',
    ];

    public function cases()
    {
        return $this->hasOne('App\Case');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseUser extends Model
{
    protected $table = 'cases_users';
    protected $fillable = [
        'id',
        'user_id',
        'case_id',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseClient extends Model
{
	protected $table = 'case_clients';
    protected $fillable = [
        'description',
        'status_id',
        'user_id',
        'date_created',
    ];

    public function user ()
    {
        return $this->BelongsTo('App\User');
    }

     public function status ()
    {
        return $this->hasmany('App\Status');
    }

    public function client ()
    {
        return $this->BelongsTo('App\Client');
    }

    public function scopeSearch($query,$from,$to)
    {
        if (($from != '') && ($to != '')) {
           $query->whereBetween('created_at', [$from, $to]);
        }
    }
}

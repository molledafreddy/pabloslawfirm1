<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = [
        'id',
        'button_name',
        'button_link',
        'modal_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function detailModal(){
        return $this->belongsTo(Modal::class,'modal_id');   
    }

}

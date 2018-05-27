<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'id',
        'image',
        'title',
        'subtitle',
        'description',
        'button_id',
        'section_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function detailButton(){
        return $this->belongsTo(Button::class,'button_id');   
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     protected $fillable = [
        'id',
        'name',
        'identifier'
    ];


    public function detailComponent(){
        return $this->belongsTo(Component::class,'id','section_id');   
    }

}

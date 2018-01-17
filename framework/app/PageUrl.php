<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    protected $table = 'page_url';

    function Food(){
        return $this->hasOne('App\Food','id_url','id');
        // id_url: foreign key
        // id: primary of url
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comapny extends Model
{
    //
    public function category() {
    	return $this->hasOne('App\Category');
    }
}

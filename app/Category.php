<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function company() {
    	return $this->hasOne('App\Company');
    }
    public function subcategory() {
    	return $this->hasOne('App\Subcategory');
    }

}

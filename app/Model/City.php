<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
	protected $table    = 'cities'; //after Update
	protected $fillable = [
		'city_name_ar',
		'city_name_en',
		'country_id',
	];
public function country_id(){
	teturn this ->hasOne(\App\Model\Country::class,'id','country_id');
}
}


<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model {
	protected $table    = 'manufacturers';
	protected $fillable = [
		'name_ar',
		'name_en',
		'email',
		'mobile',
		'facebook',
		'twitter',
		'address',
		'website',
		'contact_name',
		'lat',
		'lng',
		'icon',
	];

}
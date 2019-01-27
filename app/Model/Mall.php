<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model {
    protected $table    = 'malls';
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'country_id',
        'twitter',
        'address',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];

    public function country_id() {
        return $this->hasOne('App\Model\Country', 'id', 'country_id');
    }

}

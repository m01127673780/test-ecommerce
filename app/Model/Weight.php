<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $table    = 'weights';
   protected $fillable = [
      'name_ar',
      'name_en',
    ];

}

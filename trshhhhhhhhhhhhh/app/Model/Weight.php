<?php
namespace App\Model;

use IlluminatecDatabase\Eloquent\Model;

class Weight extends Model
{
       protected $table    = 'weights';
       protected $fillable = [
      'name_ar',
      'name_en',
    ];
}

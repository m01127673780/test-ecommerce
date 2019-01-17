<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table    = 'departments'; //after Update
	protected $fillable = [
					
					'dep_name_ar',
					'dep_name_en',
					'icon',
					'descripton',
					'keyword',
					'parent_id',
					'parent_id',


];
	public function parents(){
		return $this->hasMany('App\Model\Department','id','parent_id');
	  }
	 
	}


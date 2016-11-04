<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	public $table = 'staff';

	public $timestamps = false;

	public function rotaSlots()
	{
		return $this->hasMany('App\Models\StaffRotaSlot')
			->orderBy('day_number', 'ASC')
			->orderBy('start_time', 'ASC');
	}

	public function getFullNameAttribute()
	{
		return $this->first_name .' ' . $this->last_name;
	}
}

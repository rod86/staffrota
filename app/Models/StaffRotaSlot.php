<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRotaSlot extends Model
{
	public $table = 'staff_rota_slots';

    public $timestamps = false;

	public function staff()
	{
		return $this->belongsTo('App\Models\Staff');
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffRotaSlot;

class RotaController extends Controller {

	public function index()
	{
		$rota = $this->getRota();

		return view('rota.index', $rota);
	}

	/**
	 * Get assigned rota slots and group them by staff member.
	 * Calculate total work hours and group by day
	 *
	 * @return array
	 */
	protected function getRota()
	{
		$rota = [];
		$totals = [];

		$data = StaffRotaSlot::orderBy('staff_id')
			->where('staff_id','!=', NULL)
	        ->orderBy('day_number', 'ASC')
	        ->orderBy('start_time', 'ASC')
	        ->get();

		foreach ($data as $row)
		{
			// group rota by staff member
			$rota[$row->staff_id]['staff'] = $row->staff;
			$rota[$row->staff_id]['slots'][$row->day_number][] = $row;

			// sum hours by day
			$hours = (isset($totals[$row->day_number]) ? $totals[$row->day_number] : 0);
			$totals[$row->day_number] = $hours + $row->work_hours;
		}

		return ['rota' => $rota, 'totals' => $totals];
	}
}
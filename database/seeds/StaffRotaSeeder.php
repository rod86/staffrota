<?php

use Illuminate\Database\Seeder;
use App\Models\StaffRotaSlot;

class StaffRotaSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

	    foreach ($data as $item)
	    {
	    	$rota = new StaffRotaSlot();
		    $rota->id = $item['id'];
		    $rota->rota_id = $item['rotaid'];
		    $rota->day_number = $item['daynumber'];
		    $rota->staff_id = $item['staffid'];
		    $rota->slot_type = $item['slottype'];
		    $rota->start_time = $item['starttime'];
		    $rota->end_time = $item['endtime'];
		    $rota->work_hours = $item['workhours'];
		    $rota->save();
	    }
    }

    protected function data()
    {
        return json_decode(file_get_contents(database_path('seeds/data/rota_slot_staff.json')), true);
    }
}

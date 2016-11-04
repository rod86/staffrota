<?php

use Illuminate\Database\Seeder;
use App\Models\StaffRotaSlot;
use App\Models\Staff;

class StaffSeeder extends Seeder
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
			$staff = new Staff();
			$staff->id = $item['id'];
			$staff->first_name = $item['first_name'];
			$staff->last_name = $item['last_name'];
			$staff->save();
		}
	}

	protected function data()
	{
		return json_decode(file_get_contents(database_path('seeds/data/staff.json')), true);
	}
}

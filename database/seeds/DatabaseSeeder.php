<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $_tables = [
		'staff_rota_slots',
		'staff'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->_truncate();

	    $this->call(StaffSeeder::class);
        $this->call(StaffRotaSeeder::class);
    }

	protected function _truncate() {

		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		foreach ($this->_tables as $table) {
			$this->command->info('Truncating table ' . $table);
			DB::table($table)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}

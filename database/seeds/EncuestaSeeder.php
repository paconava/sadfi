<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class EncuestaSeeder extends CsvSeeder
{
	public function __construct()
	{
		$this->table = 'encuesta';
		$this->csv_delimiter = '|';
		$this->filename = 'csvs/p15.csv';
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();

		parent::run();
    }
}

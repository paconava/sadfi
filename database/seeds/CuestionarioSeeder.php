<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class CuestionarioSeeder extends CsvSeeder
{
	public function __construct()
	{
		$this->tablename = 'c_sociodemografico';
		$this->csv_delimiter = ';';
		$this->timestamps = false;
		$this->file = '/database/seeds/csvs/c_sociodemografico.csv';
		$this->encode = true;
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
		DB::table($this->tablename)->truncate();

		parent::run();
    }
}

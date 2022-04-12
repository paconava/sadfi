<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class EncuestaSeeder extends CsvSeeder
{
	public function __construct()
	{
		$this->tablename = 'encuesta';
		$this->csv_delimiter = ';';
		$this->timestamps = false;
		$this->file = '/database/seeds/csvs/book3.csv';
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

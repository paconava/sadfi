<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SemestresSeeder::class);
        $this->call(DivisionesSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(P15Seeder::class);
    }
}

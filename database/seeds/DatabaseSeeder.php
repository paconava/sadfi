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
        $this->call(UserSeeder::class);
        $this->call(SemestresSeeder::class);
        $this->call(DivisionesSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(EncuestaSeeder::class);
        $this->call(CuestionarioSeeder::class);
        $this->call(SivacoreSeeder::class);
    }
}

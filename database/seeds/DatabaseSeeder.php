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
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(JuzgadoTableSeeder::class);
        $this->call(InternsTableSeeder::class);
        $this->call(JuztipoTableSeeder::class);
        $this->call(MacroetapaTableSeeder::class);
        $this->call(JuicioTableSeeder::class);
    }
}

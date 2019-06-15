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
        $this->call(JuzgadotipoTableSeeder::class);
        $this->call(JuzgadoTableSeeder::class);
        $this->call(JuiciotiposTableSeeder::class);
        $this->call(MacroetapaTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(SalaapelasTableSeeder::class);
        $this->call(MonedaTableSeeder::class);
        $this->call(JuicioTableSeeder::class);
        $this->call(JuiciouserTableSeeder::class);
        $this->call(DemandadoTableSeeder::class);
        $this->call(DocTipoTableSeeder::class);
        $this->call(DocJuicioTableSeeder::class);
        $this->call(NotasTableSeeder::class);
    }
}

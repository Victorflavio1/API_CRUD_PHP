<?php

namespace Database\Seeders;

use App\Models\Cadastro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CadastroSeeder extends Seeder
{
    /**Run the database seeds.
     */
    public function run(): void
    {
        Cadastro::factory()->count(100)->create();
    }
}

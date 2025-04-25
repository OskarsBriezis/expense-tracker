<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Importē kategoriju modeli
use App\Models\Expense; // Importē Expense modeli

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    Category::factory()->count(3)->create(); // Izveido 3 kategorijas
    Expense::factory()->count(10)->create(); // Izveido 10 izmaksu ierakstus
    }
}







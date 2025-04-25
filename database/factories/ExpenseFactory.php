<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Expense;
use App\Models\Category;

class ExpenseFactory extends Factory
{
    protected $model = Expense::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(), // Nejaušs datums
            'amount' => $this->faker->randomFloat(2, 1, 1000), // Skaitlis ar 2 cipariem aiz komata
            'category_id' => Category::pluck('id')->random(), // Nejaušs esošās kategorijas ID
            'notes' => $this->faker->sentence(), // Nejaušs teksts piezīmēm
        ];
    }
}

